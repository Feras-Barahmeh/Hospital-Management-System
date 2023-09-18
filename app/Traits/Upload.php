<?php

namespace App\Traits;

use App\Helpers\Enums\Disks;
use App\Helpers\Manipulate;
use App\Helpers\Session;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

trait Upload
{
    /**
     * Check if a file with the given input name exists in the request.
     *
     * This method checks if a file with the specified input name exists in the provided
     * request object.
     *
     * @param Request $request The HTTP request object.
     * @param string $inputName The name of the file input field to check.
     *
     * @return bool|string True if a file with the specified input name exists in the request; otherwise, false.
     */
    private static function fileInputExists(Request $request, string $inputName): bool|string
    {
        if (! $request->hasFile($inputName)) {
            return false;
        }
        return $inputName;
    }
    /**
     * Generate a unique file name based on the user-provided name and file extension.
     *
     * This method creates a unique file name for an uploaded file by using the provided
     * user-provided name and the original file's extension.
     *
     * @param Request $request   The HTTP request object.
     * @param string  $inputName The name of the file input field in the request.
     *
     * @return string A unique file name combining the sanitized user-provided name and the original file extension.
     */
    private static function generateFileName(Request $request, string $inputName): string
    {
        return Str::slug($request->input('name')) . '.' . $request->file($inputName)->getClientOriginalExtension();
    }

    /**
     * Validate an uploaded file against specified rules or default image rules.
     *
     * This method performs validation on an uploaded file based on the provided validation rules
     * or the default image validation rules if none are specified. It throws a ValidationException
     * if the validation fails.
     *
     * @param Request           $request     The HTTP request object.
     * @param string            $inputName   The name of the file input field in the request.
     * @param string|array|null $validation  Optional. The validation rules for the file.
     *
     * @throws ValidationException If the validation fails.
     */
    private static function validation(Request $request,string $inputName,string|array|null $validation=null): void
    {
        $validation = $validation ?? 'required|file|image|mimes:png,jpg,jpeg';
        $validator = Validator::make($request->all(), [
            $inputName =>  $validation,
        ], [
            "dimensions" => "The image has invalid image dimensions. must width less 500px height less 500px",
        ]);


        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

    }

    /**
     * Sort and store an uploaded file, associating it with a specific model entity.
     *
     * This method validates and stores an uploaded file, associating it with a specific model
     * entity identified by its ID and type. It also handles the file storage in the specified
     * disk and folder. If validation fails or the file upload fails, it returns false.
     *
     * @param Request               $request       The HTTP request object.
     * @param string                $inputName     The name of the file input field in the request.
     * @param string                $nameFolder    The name of the folder to store the file in.
     * @param string                $disk          The disk to use for file storage.
     * @param int|string            $id            The ID of the associated model entity.
     * @param string                $type          The type of the associated model entity.
     * @param array|string|null     $validation    Optional. The validation rules or nullable MIME types for the file.
     *
     * @return bool True if the file was successfully sorted and stored; otherwise, false.
     *
     * @throws ValidationException
     */
    public static function sort(Request $request,
                                string $inputName,
                                string $nameFolder,
                                string $disk,
                                int|string $id,
                                string $type,
                                $img=null,
                                array|string $validation=null): bool
    {
        $inputName = self::fileInputExists($request, $inputName);

        ! $inputName ?? self::validation($request, $inputName, $validation);

        if ($inputName) {
            $nameFile = self::generateFileName($request, $inputName);

            $img = $img ?? new Image();
            $encryptName = Hash::make($nameFile);
            $img->url = $nameFolder.DIRECTORY_SEPARATOR. $encryptName;
            $img->imageable_id = $id;
            $img->imageable_type = $type;
            $img->save();

            return $request->file($inputName)->storeAs($nameFolder, $encryptName, $disk);
        }

        return false;
    }
}
