<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class EmailRule implements Rule
{
    protected $isAstonEmail = false;

    public function __construct()
    {
        //
    }

    public function passes($attribute, $value)
    {

        // Normalize email to lowercase
        $email = strtolower($value);

        // Check if it ends with @aston.ac.uk
  //return str::endsWith($value, 'anything@aston.ac.uk');
       //return Str::contains($value, ['astonacuk', 'aston.ac.uk']);


        if (Str::endsWith($email, '@aston.ac.uk')) {
            $this->isAstonEmail = true;
            return true; // Accept Aston emails
        }

        // Accept all other valid emails too
        return true;
    }

    public function message()
    {
        // Only used if you ever decide to restrict Aston emails
        return 'Please enter a valid email address.';
    }
}
