<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $guarded = ['id'];

    protected $fillable = [
        'first_name', 'last_name', 'email', 'telephone_number'
    ];
}
