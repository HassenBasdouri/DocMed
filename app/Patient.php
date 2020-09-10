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
    public function rendezvouses()
    {
        return $this->hasMany('App\RendezVous');
    }
}
