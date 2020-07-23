<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Brand;
use App\Order;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price', 'image', 'category_id', 'brand_id', 'order_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function orders() {
        return $this->belongsToMany(Order::class);
    }

}
