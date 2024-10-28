<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payments extends Model
{
    //
    use HasFactory;
    protected $table = "payments";
    protected $primaryKey = "id";
    
    public function payment_methods()
    {
        return $this->belongsTo(payment_methods::class, 'payment_method_id');
    }
    public function rentals()
    {
        return $this->belongsTo(rentals::class, 'rental_id');
    }

}
