<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Phone implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!preg_match('/^\(\d{2}\)\s?\d{4,5}-\d{4}$/', $value) > 0) {
            $fail('O campo :attribute não é um celular com DDD válido. Ex.: (99) 99999-9999.');
        }
    }
}
