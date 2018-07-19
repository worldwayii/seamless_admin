<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    
    protected $fillable = [
         'first_name', 'last_name', 'company_id', 'email', 'phone_number',
    ];

    public function company()
    {
    	return $this->belongsTo('App\Company', 'company_id');
    }


    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
