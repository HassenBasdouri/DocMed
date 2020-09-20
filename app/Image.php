<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $fillable = [
        'path',
        'description',
        'patient_id',
        'user_id',
    ];
    public function patient()
    {
        return $this->belongsTo('App\Patient','patient_id');
    }
}
