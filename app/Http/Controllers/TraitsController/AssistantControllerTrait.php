<?php

namespace App\Http\Controllers\TraitsController;

use App\Traits\Messages;

trait AssistantControllerTrait
{
    use Messages;

    protected string $folder    = 'dashboard.admin.assistants.';
    protected string $routeIndex     = 'admin.assistants.index';

    protected array $roles =  [
        'note'  =>  'max:200',
        'price' =>  'required|gt:0',
    ];


    protected static function dispatchPopup($flag, string $messages, $param): void
    {
        $messages = explode(':', $messages);
        $success = trim($messages[0]);
        $fail = trim($messages[1]);

        $flag ?
              self::popupSuccess('assistants', "$success", $param)
            : self::popupFail('assistants', "$fail", $param);
    }

    protected  static function dispatchNotification($flag, string $messages): void
    {
        $messages = explode(':', $messages);
        $success = trim($messages[0]);
        $fail = trim($messages[1]);

        $flag ?
            self::successNotification('assistants', "$success")
            : self::failNotification('assistants', "$fail");
    }
}
