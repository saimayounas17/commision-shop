<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class CustomeBalance extends Model
{
    use HasFactory;


    public function customers()
    {
    return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function invoice()
    {
        return $this->belongsTo(invoice::class, 'invoice_id');

    }
    public function getCreatedAtAttribute($value)
{
    return Carbon::parse($value)->format('Y-m-d');
}



}
