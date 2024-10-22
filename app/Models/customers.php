<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class customers extends Model
{
    //
    protected static function boot()
    {
        parent::boot();

        // Hook into the creating and updating events
        static::creating(function ($customer) {
            self::validateEmail($customer);
        });

        static::updating(function ($customer) {
            self::validateEmail($customer);
        });
    }

    /**
     * Validate the uniqueness of the email.
     *
     * @param  \App\Models\customers  $customer
     * @throws \Illuminate\Validation\ValidationException
     */
    protected static function validateEmail($customer)
    {
        $validator = Validator::make(
            ['email' => $customer->email],
            ['email' => 'required|email|unique:customers,email,' . $customer->id]
        );

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }
    use HasFactory;
    
    protected $table = "customers";
    protected $primaryKey = "id";
}
