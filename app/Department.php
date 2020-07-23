<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name', 'employee_id'];

    public function employee() {

        $this->hasMany(Employee::class);
    }
}
