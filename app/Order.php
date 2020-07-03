<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Customer;
use App\Employee;


class Order extends Model
{
    protected $fillable = ['status', 'employee_id', 'customer_id'];

//    public function customer()   /*check the relations for order details table*/
//    {
//        return $this->hasOne(Customer::class, 'customer_id', 'id');
//    }
}
