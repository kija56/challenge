<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{   
    protected $fillable = array('firstName','lastName', 'email','company','phone');

    public function company(){
        return $this->belongsTo(Company::class);
    }
}
