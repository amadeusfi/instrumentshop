<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['last_name','first_name','birth_date','registration_date',
        'address','city','plz','country','phone','email','password','image',];

   /* public function validationRules () {
        return ['last_name'=>'required',
            'first_name'=>'required',
            'birth_date' => 'required|date',
            'registration_date' => 'required|date',
            'address'=>'required',
            'city'=>'required',
            'plz'=>'required',
            'country'=>'required',
            'email'=>'required',
            'password'=>'required',
            'image'=> 'required|mimes:png,jpeg,jpg'];
        }*/
};
