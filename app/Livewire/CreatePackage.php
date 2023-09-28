<?php

namespace App\Livewire;

use App\Models\Assistant;
use App\Models\Package;
use App\Traits\Messages;
use App\TraitsLivewire\Packages;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use stdClass;

class CreatePackage extends Component
{
        use Messages, Packages;

        public mixed $defaultService = 'default';

        /**
         * price chosen for assistant
         *
         * @var mixed
         */
        public mixed $priceService;

        /**
         * Quantity chosen for assistant
         *
         * @var mixed
         */
        public int $quantity = 0;

        /**
         * total price to assistant
         *
         * @var mixed
         */
        public mixed $totalPriceService = '0.00';

        /**
         * Servant object
         */
        public Assistant|null $servant;

        /**
         *
         * @var array
         */
        public array $servicesInPackage = [];

        /**
         * price Package
         */

        public mixed $pricePackage = '0.00';
        /**
         * tax package
         *
         * @var mixed
         */
        public mixed $tax = 5;

        /**
         * discount of package
         * @var mixed
         */
        public mixed $discountAmount = 0;

        /**
         * price package to user
         * @var mixed
         */
        public mixed $priceWithTax;

        public string $namePackage = '';
        public string $descriptionPackage = '';

        /**
         * set all value when chose assistant
         *
         * @param string $id id service in db
         * @return void
         */
        public function replenish(string $id): void
        {
                $this->servant = Assistant::find($id);
                $this->quantity = 1;
                $this->priceService = $this->servant->price;
                $this->totalPriceService = $this->quantity * $this->priceService;
                $this->calculatePricePackage();
        }

        /**
         * set new quantity when change
         *
         * @param mixed $qty the new quantity service
         * @return void
         */
        public function setQtyService(mixed $qty): void
        {
                if (!$qty || $qty <= 0) return;
                $this->quantity = $qty;
                $this->setTotalPriceService($qty);
        }

        /**
         * clean all properties
         * @return void
         */
        public function clean(): void
        {
                $this->servant = null;
                $this->priceService = 0;
                $this->quantity = 0;
                $this->totalPriceService = '0.00';
                $this->setDefaultService('default');
        }

        /**
         * add service in package
         *
         * @return void
         */
        public function insertServiceToPackage(): void
        {
                if (!isset($this->servicesInPackage[$this->servant->id])) {
                        $this->servicesInPackage[$this->servant->id] = new stdClass();
                        $this->servicesInPackage[$this->servant->id]->assistant = $this->servant;
                        $this->servicesInPackage[$this->servant->id]->qty = $this->quantity;
                        $this->servicesInPackage[$this->servant->id]->totalPriceService = $this->totalPriceService;
                        $this->clean();
                        $this->calculatePricePackage();
                        $this->calculatePriceWithTax();
                } else {
                        $this->addError('exist_service',
                                self::msg('exist_service', $this->servant->name));
                }
        }

        /**
         * delete service from package
         *
         * @param string $id identifier
         * @return void
         */
        public function delete(string $id): void
        {
                if (isset($this->servicesInPackage[$id])) {
                        unset($this->servicesInPackage[$id]);
                        $this->calculatePricePackage();
                        $this->calculatePriceWithTax();
                } else {
                        $this->addError('delete_not_exist_service',
                                self::msg('delete_not_exist_service'));
                }
        }

        /**
         * edit service information in package
         *
         * @param $id
         * @return void
         */
        public function edit($id): void
        {
                $service = $this->servicesInPackage[$id];
                $this->delete($id);
                $this->servant = $service->assistant;
                $this->quantity = $service->qty;
                $this->totalPriceService = $service->totalPriceService;
                $this->priceService = $service->assistant->price;
                $this->setDefaultService($service->assistant->id);
                $this->calculatePricePackage();
                $this->calculatePriceWithTax();
        }

        /**
         * calculate price package
         */
        public function calculatePricePackage(): void
        {
                $this->pricePackage = 0;
                foreach ($this->servicesInPackage as $service) {
                        $this->pricePackage += $service->totalPriceService;
                }
        }

        /**
         * set tax value
         */
        public function setTax($value): void
        {
                if (!$value) $value = 0;
                $this->tax = $value;
                $this->calculatePriceWithTax();
        }

        /**
         * set discount amount
         */
        public function setDiscountAmount($value): void
        {
                if (!$value) $value = 0;
                $this->discountAmount = $value;
                $this->calculatePriceWithTax();
        }


        /**
         * set default service
         *
         * @param mixed $defaultService
         * @return void
         */
        public function setDefaultService(mixed $defaultService): void
        {
                $this->defaultService = $defaultService;
        }

        /**
         * total price
         *
         * @param mixed $qty
         * @return void
         */
        public function setTotalPriceService(mixed $qty): void
        {
                $this->totalPriceService = $qty * $this->priceService;
                $this->servant->servicePrice = $this->totalPriceService;
        }


        /**
         * calculate out of the door price
         *
         * @return void
         */
        public function calculatePriceWithTax(): void
        {
                $price = $this->pricePackage + ($this->pricePackage - $this->discountAmount) * $this->tax / 100;
                $this->priceWithTax = max($price, 0);
        }

        /**
         * set discount for this package
         *
         * @param $value
         * @return void
         */
        public function setDescriptionPackage($value): void
        {
                $this->descriptionPackage = $value;
        }

        /**
         * set name package
         *
         * @param string $value
         * @return void
         */
        public function setNamePackage(string $value): void
        {
                $this->namePackage = $value;
        }

        public function rules(): array
        {
                return [
                        'namePackage' => 'required|string|max:255|unique:package_translations,package_name',
                        'descriptionPackage' => 'max:255',
                ];
        }

        public function messages(): array
        {
                return [
                        'namePackage.required' => 'The name field is required.',
                ];
        }

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
                $this->validate();
                if (empty($this->servicesInPackage)) {
                        session()->flash('no_assistant', 'At least has one assistant');
                        return false;
                } else {
                        $package = new Package();
                        $package->total_before_discount = $this->pricePackage;
                        $package->total_after_discount = $this->pricePackage - $this->discountAmount;
                        $package->discount_amount = $this->discountAmount;
                        $package->out_the_door_price = $this->priceWithTax;
                        $package->tax = $this->tax;

                        $package->package_name = $this->namePackage;
                        $package->description = $this->descriptionPackage;
                        $package->save();

                        foreach ($this->servicesInPackage as $service) {
                                $package->package()->attach($service->assistant->id);
                        }
                        self::popupSuccess('packages', 'success_add', $this->namePackage);
                        $this->unloadPackage();
                        return Redirect::route('admin.packages');
                }

        }

        /**
         * Clears and resets the properties of the package instance.
         *
         * This method unsets the services within the package, cleans any related data,
         * and resets the package's name and description.
         *
         * @return void
         */
        private function unloadPackage(): void
        {
                unset($this->servicesInPackage);
                $this->clean();
                $this->namePackage = '';
                $this->descriptionPackage = '';
        }

        public function render(): View|\Illuminate\Foundation\Application|Factory|Application
        {
                return view('livewire.packages.create-package', [
                        'assistants' => Assistant::all(),
                ]);
        }

}
