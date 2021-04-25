<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable=[
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'address',
        'date_of_birth',
        'contact_number'
    ];

    
}
