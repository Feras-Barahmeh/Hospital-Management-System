<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class InsurancesCompleted implements ValidationRule
{
        /**
         * Run the validation rule.
         *
         * @param Closure(string): PotentiallyTranslatedString $fail
         */
        public function validate(string $attribute, mixed $value, Closure $fail): void
        {
                if ((int)request('patient_discount_rate') + (int)request('company_rate') !== 100) {
                        $fail(__('dashboard/insurances.price_not_completed'));
                }
        }
}
