<?php

namespace App\Traits;

use App\Helpers\Manipulate;
use App\Helpers\Session;

trait Messages
{

    /**
     * Set a popup success message box
     *
     * @param string        $targetFile file name contain messages
     * @param string        $nameMessage The message name you want set in body popup
     * @param array|string  $params if message has params this array contain this params
     * @param string        $title The title for the success message (default: 'well_done').
     *
     * @return void
     */
    public static function popupSuccess(string $targetFile, string $nameMessage, array|string $params=[], string $title='well_done'): void
    {
        $params = is_string($params) ? [$params] : $params;

        Session::flashArray('success-popup', [
            'title' => trans('common.'.$title),
            'text' => Manipulate::format(__("dashboard/{$targetFile}.".$nameMessage), $params),
        ]);
    }
    /**
     * Set a popup fail message box
     *
     * @param string        $targetFile file name contain messages
     * @param string        $nameMessage The message name you want set in body popup
     * @param array|string  $params if message has params this array contain this params
     * @param string        $title The title for the success message (default: 'well_done').
     *
     * @return void
     */
    public static function popupFail(string $targetFile, string $nameMessage, array|string $params=[], string $title='oops'): void
    {
        $params = is_string($params) ? [$params] : $params;

        Session::flashArray('fail-popup', [
            'title' => trans('common.'.$title),
            'text' => Manipulate::format(
                __("dashboard/{$targetFile}.".$nameMessage), $params),
        ]);
    }
}