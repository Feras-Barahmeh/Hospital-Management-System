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
use stdClass;

class EditPackage extends Component
{
        use PackagesController, Messages;

        public mixed $id;

        private function setAssistantsInPackage($package): void
        {
                foreach ( $package->assistants as $assistant) {
                        $element = new stdClass();
                        $element->assistant = $assistant;

                        $element->qty = $assistant->pivot->qty;

                        $element->totalPriceService = $assistant->price * $element->qty;
                        $this->servicesInPackage[$assistant->id] = $element;
                }
        }


        /**
         * Update package, saves it to the database, and unloads the current package data.
         *
         * This method update specific package instance, populates it with the current data,
         * saves it to the database, and unloads the package data to prepare for the next package.
         *
         * @return RedirectResponse|Redirector|bool
         */
        public function updatePackage(): RedirectResponse|Redirector|bool
        {
                $this->pushRule('namePackage' ,'required|string|max:255|unique:package_translations,package_name,' . $this->id);
                $this->validate();
                if (! $this->customValidation()) return false;

                $package = Package::find($this->id);
                $this->savePackage($package);

                $newServiceQuantities = [];
                foreach ($this->servicesInPackage as $service) {
                        $newServiceQuantities[$service->assistant->id] = ['qty' => $service->qty];
                }
                $package->assistants()->sync($newServiceQuantities);

                self::popupSuccess('packages', 'success_update', $this->namePackage);
                $this->unloadPackage();
                return Redirect::route('admin.packages.index');

        }

        public function mount(): void
        {

                $package = Package::find($this->id);

                $this->namePackage  = (string) $package->package_name;
                $this->pricePackage = $package->total_before_discount;
                $this->discountAmount = $package->discount_amount;
                $this->priceWithTax = $package->out_the_door_price;
                $this->descriptionPackage = (string)$package->description;
                $this->setAssistantsInPackage($package);
        }

        public function render(): View|\Illuminate\Foundation\Application|Factory|Application
        {
                return view('livewire.packages.edit-package', [
                        'assistants' => Assistant::all(),
                ]);
        }
}
