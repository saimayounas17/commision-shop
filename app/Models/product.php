<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'available_weight'
    ];



    public function invoice()
    {
    return $this->hasMany(invoice::class, 'id');
    }


}
