<?php

namespace App\Rules;

use App\Models\Plan;
use Illuminate\Contracts\Validation\Rule;

class PlanAvailable implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {   
        return Plan::firstWhere('id', $value) ?? false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The plan you trying to subscribe to does not exist.';
    }
}
