<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'balance',

    ];




    public function invoice()
    {
    return $this->hasMany(invoice::class, 'id');
    }
    public function transaction(){
    return $this->hasMany(CustomeBalance::class, 'id');

    }
    public function getCreatedAtAttribute($value)
{
    return Carbon::parse($value)->format('Y-m-d ');
}
}
