<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name', 'description','product_id', 'image'];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
