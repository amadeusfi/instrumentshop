<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\customer;

class Payment extends Model
{
    protected $fillable = ['amount', 'customer_id'];

    public function customer()
    {
        return $this->hasOne(Customer::class, 'customer_id', 'id');
    }
}
