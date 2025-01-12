<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cars extends Model
{
    //
    use HasFactory;
    
    protected $table = "cars";
    protected $primaryKey = "id";

    public function brand()
    {
        return $this->belongsTo(brand::class, 'brand_id');
    }

    public function color()
    {
        return $this->belongsTo(color::class, 'color_id');
    }

    public function transmission__type()
    {
        return $this->belongsTo(transmissions::class, 'transmission_id');
    }
}
