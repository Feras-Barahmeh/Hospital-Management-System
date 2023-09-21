<?php

namespace App\Repository;

use App\Http\Controllers\TraitsController\AssistantControllerTrait;
use App\Interfaces\Repository\IAssistants;
use App\Models\Assistant;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AssistantRepository implements IAssistants
{
    use AssistantControllerTrait;

    /**
     * validation
     *
     * @throws ValidationException
     */
    private function validate(Request $request, string|int|null $unique): \Illuminate\Validation\Validator
    {
        $validate = Validator::make($request->all(), array_merge($this->roles, [
            'name' => 'required|max:100|unique:assistant_translations,name,'.$unique.',name',
        ]));

        if ($validate->fails()) {
            throw new ValidationException($validate);
        }
        return $validate;
    }


    /**
     * @inheritDoc
     */
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $assistants = Assistant::all();
        return view($this->folder . 'index', [
            'assistants' => $assistants,
        ]);
    }

    /**
     * @inheritDoc
     */
    public function create()
    {
        // TODO: Implement create() method.
    }

    /**
     * @inheritDoc
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, $request->input('name'));

        $flag = Assistant::create($request->all());

        self::dispatchPopup($flag, 'success_add:fail_add', $request->input('name'));

        return Redirect::route($this->routeIndex );
    }

    /**
     * @inheritDoc
     */
    public function show(string $id)
    {
        // TODO: Implement show() method.
    }

    /**
     * @inheritDoc
     */
    public function edit(string $id)
    {
        // TODO: Implement edit() method.
    }


    /**
     * @inheritDoc
     * @throws ValidationException
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $assistant = Assistant::find($id);

        $this->validate($request, $assistant->name);

        $assistant->update($request->all());

        self::dispatchPopup($assistant->save(), 'success_edit:fail_edit', $assistant->name);

        return Redirect::route($this->routeIndex );
    }

    /**
     * @inheritDoc
     */
    public function destroy(string $id): RedirectResponse
    {
        $assistant = Assistant::find($id);
        $name = $assistant->name;
        self::dispatchPopup($assistant->delete(), 'success_delete:fail_delete', $name);
        return Redirect::route($this->routeIndex );
    }
    /**
     * Toggle assistant status
     */
    public function toggleStatus(string $id): RedirectResponse
    {
        $assistant = Assistant::find($id);
        $assistant->status = ! $assistant->status;

        self::dispatchNotification($assistant->save(), 'success_toggle_status:fail_toggle_status');

        return Redirect::route($this->routeIndex );
    }
}
