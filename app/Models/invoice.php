<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class invoice extends Model
{
    use HasFactory;

    public function customer()
    {
    return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function product()
    {
    return $this->belongsTo(product::class, 'product_id');
    }
    public function getCreatedAtAttribute($value)
{
    return Carbon::parse($value)->format('Y-m-d');
}
}
