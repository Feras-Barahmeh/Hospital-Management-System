<?php

namespace App\Http\Controllers\TraitsController;

trait Controller
{
        protected function pushToRule(array $rules, string $nameRule, mixed $value, $symbol=','): array
        {
                if (is_string($rules[$nameRule])) {
                        $rules[$nameRule] = $rules[$nameRule] . $symbol . $value;
                } else {
                        $rules[$nameRule][] = $value;
                }
                return $rules;
        }

        protected function pushRule(string $key, string|array $rule): void
        {
                $rules[$key] = $rule;
        }
}
