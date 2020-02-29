<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Employee extends Model
{   
    use Notifiable;
    protected $fillable = array('firstName','lastName', 'email','company_id','phone');

    public function company(){
        return $this->belongsTo(Company::class);
    }
}
