<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //
    protected $fillable = [
        'path',
        'libelle',
        'description',
        'type',
        'patient_id',
        'user_id',
    ];
    public function patient()
    {
        return $this->belongsTo('App\Patient','patient_id');
    }
}
