<?php

namespace App\Livewire;

use App\Http\Controllers\TraitsController\PackagesController;
use App\Models\Assistant;
use App\Models\Package;
use App\Traits\Messages;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class CreatePackage extends Component
{
        use Messages, PackagesController;


        /**
         * Creates a new package, saves it to the database, and unloads the current package data.
         *
         * This method creates a new package instance, populates it with the current data,
         * saves it to the database, and unloads the package data to prepare for the next package.
         *
         * @return RedirectResponse|Redirector|bool
         */
        public function saveAndUnloadPackage(): RedirectResponse|Redirector|bool
        {
                $this->pushRule('namePackage' ,'required|string|max:255|unique:package_translations,package_name');
                $this->validate();
                if (! $this->customValidation()) return false;

                $package = new Package();
                $this->savePackage($package);

                foreach ($this->servicesInPackage as $service) {
                        $package->assistants()->attach($service->assistant->id, ['qty' => $service->qty]);
                }

                self::popupSuccess('packages', 'success_add', $this->namePackage);
                $this->unloadPackage();
                return Redirect::route('admin.packages.index');

        }

        public function render(): View|\Illuminate\Foundation\Application|Factory|Application
        {
                return view('livewire.packages.create-package', [
                        'assistants' => Assistant::all(),
                ]);
        }

}
