<?php

namespace App\Traits;

use App\Helpers\Manipulate;
use App\Helpers\Session;

trait Messages
{

        /**
         * Set a popup success message box
         *
         * @param string $targetFile file name contain messages
         * @param string $nameMessage The message name you want set in body popup
         * @param array|string|null $params if message has params this array contain this params
         * @param string $title The title for the success message (default: 'well_done').
         * @return void
         * @deprecated
         * @alias showSuccessPopup()
         */
        public static function popupSuccess(string $targetFile, string $nameMessage, array|string|null $params = [], string $title = 'well_done'): void
        {
                $params = is_string($params) || is_null($params) ? [$params] : $params;

                Session::flashArray('success-popup', [
                        'title' => trans('common.' . $title),
                        'text' => Manipulate::format(__("dashboard/{$targetFile}." . $nameMessage), $params),
                ]);
        }

        /**
         * Set a popup fail message box
         *
         * @param string $targetFile file name contain messages
         * @param string $nameMessage The message name you want set in body popup
         * @param array|string|null $params if message has params this array contain this params
         * @param string $title The title for the success message (default: 'well_done').
         *
         * @return void
         * @deprecated
         * @alias showPopupFail()
         */
        public static function popupFail(string $targetFile, string $nameMessage, array|string|null $params = [], string $title = 'oops'): void
        {
                $params = is_string($params) ? [$params] : $params;

                Session::flashArray('fail-popup', [
                        'title' => trans('common.' . $title),
                        'text' => Manipulate::format(
                                __("dashboard/{$targetFile}." . $nameMessage), $params),
                ]);
        }

        /**
         * Set information success notification message in session
         *
         * @param string $targetFile The target file or identifier for the notification.
         * @param string $nameMessage The specific message to be displayed.
         * @param string $targetFolder the folder contain message
         *
         * @return void
         * @deprecated
         * @alias notifySuccess()
         */
        public static function successNotification(string $targetFile, string $nameMessage, string $targetFolder = 'dashboard/'): void
        {
                Session::flashArray('success-notification', [
                        'type' => __('common.success'),
                        'message' => __($targetFolder . $targetFile . '.' . $nameMessage),
                ]);
        }

        /**
         * Set information fail notification message in session
         *
         * @param string $targetFile The target file or identifier for the notification.
         * @param string $nameMessage The specific message to be displayed.
         * @param string $targetFolder the folder contain message
         * @return void
         * @deprecated
         * @alias notifyFail()
         *
         */
        public static function failNotification(string $targetFile, string $nameMessage, string $targetFolder = 'dashboard/'): void
        {
                Session::flashArray('fail-notification', [
                        'type' => __('common.fail'),
                        'message' => __($targetFolder . $targetFile . '.' . $nameMessage),
                ]);
        }

        /**
         * Set a popup success message box (whit param default in laravel)
         *
         * @param string $targetFile file name contain messages
         * @param string $nameMessage The message name you want set in body popup
         * @param array|string|null $params if message has params this array contain this params
         * @param string $title The title for the success message (default: 'well_done').
         * @return void
         * @version 1.2
         */

        protected static function showSuccessPopup(string $targetFile, string $nameMessage, array|string|null $params = [], string $title = 'well_done'): void
        {
                Session::flashArray('success-popup', [
                        'title' => trans('common.' . $title),
                        'text' =>__("dashboard/{$targetFile}." . $nameMessage, $params),
                ]);
        }

        /**
         * Set a popup fail message box
         *
         * @param string $targetFile file name contain messages
         * @param string $nameMessage The message name you want set in body popup
         * @param array|string|null $params if message has params this array contain this params
         * @param string $title The title for the success message (default: 'well_done').
         * @return void
         *@version 1.2
         */
        protected static function showPopupFail(string $targetFile, string $nameMessage, array|string|null $params = [], string $title = 'oops'): void
        {
                $params = is_string($params) ? [$params] : $params;

                Session::flashArray('fail-popup', [
                        'title' => trans('common.' . $title),
                        'text' => __("dashboard/{$targetFile}." . $nameMessage, $params),
                ]);
        }

        /**
         * Set information success notification message in session()
         *
         * @param string $targetFile The target file or identifier for the notification.
         * @param string $nameMessage The specific message to be displayed.
         * @param array $param
         * @param string $targetFolder the folder contain message
         *
         * @return void
         * @version 1.2
         */
        private static function notifySuccess(string $targetFile, string $nameMessage, array $param=[], string $targetFolder = 'dashboard/'): void
        {
                Session::flashArray('success-notification', [
                        'type' => __('common.success'),
                        'message' => __($targetFolder . $targetFile . '.' . $nameMessage, $param),
                ]);
        }

        /**
         * Set information fail notification message in session
         *
         * @param string $targetFile The target file or identifier for the notification.
         * @param string $nameMessage The specific message to be displayed.
         * @param array $params
         * @param string $targetFolder the folder contain message
         * @return void
         * @version 1.2
         */
        public static function notifyFail(string $targetFile, string $nameMessage, array $params=[], string $targetFolder = 'dashboard/'): void
        {
                Session::flashArray('fail-notification', [
                        'type' => __('common.fail'),
                        'message' => __($targetFolder . $targetFile . '.' . $nameMessage, $params),
                ]);
        }

}
