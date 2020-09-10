<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rencontre extends Model
{
    protected $fillable = [
        'date',
        'type_contact',
        'donnees_significatives',
        'conclusion',
        'decisions',
        'patient_id',
        'user_id',
    ];
    public function patient()
    {
        return $this->belongsTo('App\Patient','patient_id');
    }
}
