<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;
use App\Product;


class Order_detail extends Model
{
    protected $fillable = [ 'order_id', 'product_id', 'amount'];
}
