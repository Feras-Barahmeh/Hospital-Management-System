<?php

namespace App\Http\Controllers\TraitsController;

use App\Rules\InsurancesCompleted;

trait InsurancesController
{
        public  array $rules = [
                'company_name' => ['required', 'max:40', 'unique:insurance_translations'],
                'company_code' => 'required|alpha_dash|unique:insurances,company_code',
                'patient_discount_rate' => 'required|numeric|gt:0',
                'company_rate' => 'required|numeric|gt:0',
                'note' => 'max:200',
        ];

        protected function pushToRule(string $nameRule, mixed $value, $symbol=','): array
        {
                if (is_string($this->rules[$nameRule])) {
                        $this->rules[$nameRule] = $this->rules[$nameRule] . $symbol . $value;
                } else {
                        $this->rules[$nameRule][] = $value;
                }

                return $this->rules;
        }

        protected function pushRule(string $key, string|array $rule): void
        {
                $this->rules[$key] = $rule;
        }
}
