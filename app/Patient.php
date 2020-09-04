<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'name',
        'lastname',
        'birth',
        'phone',
        'cin',
        'cnam',
        'profession'
    ];
}
