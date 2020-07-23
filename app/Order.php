<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Customer;
use App\Employee;


class Order extends Model
{
    protected $fillable = ['status', 'employee_id', 'customer_id'];

  public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function employee()
    {
        return $this->belongsToMany(Employee::class);
    }
    public function products() {
        return $this->belongsToMany(Product::class);
    }
}
