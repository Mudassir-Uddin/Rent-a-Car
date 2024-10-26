<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rentals extends Model
{
    //
    use HasFactory;
    protected $table = "rentals";
    protected $primaryKey = "id";
    
    public function customers()
    {
        return $this->belongsTo(customers::class, 'customer_id');
    }
    public function cars()
    {
        return $this->belongsTo(cars::class, 'car_id');
    }

}
