<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name','address', 'image'];

    public function department(){
        $this->belongsTo(Department::class);
    }
}
