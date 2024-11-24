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
        return $this->belongsTo(brands::class, 'brand_id');
    }
    public function color()
    {
        return $this->belongsTo(colors::class, 'color_id');
    }
}
