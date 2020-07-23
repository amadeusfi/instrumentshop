<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\customer;

class Payment extends Model
{
    protected $fillable = ['amount', 'customer_id'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
