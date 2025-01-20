<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class models extends Model
{
    //
    use HasFactory;
    
    protected $table = "model";
    protected $primaryKey = "id";

    public function brand()
    {
        return $this->belongsTo(brand::class, 'brand_id');
    }
}
