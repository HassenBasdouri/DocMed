<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    //
    protected $fillable = [
        'date',
        'time',
        'patient_id',
        'user_id',
    ];
    public function patient()
    {
        return $this->belongsTo('App\Patient','patient_id');
    }
}
