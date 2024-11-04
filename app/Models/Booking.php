<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    use HasFactory;
    protected $table = "booking";
    protected $primaryKey = "id";

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }

    public function rentals()
    {
        return $this->belongsTo(rentals::class, 'rental_id');
    }
}
