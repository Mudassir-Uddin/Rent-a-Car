<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transmissions extends Model
{
    //
    use HasFactory;
    
    protected $table = "transmission__type";
    protected $primaryKey = "id";
}
