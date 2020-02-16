<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = array('name', 'email','website', 'price','logo');

    public function employees(){
        return $this->hasMany(Employee::class);
    }
}
