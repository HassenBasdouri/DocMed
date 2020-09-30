<?php
namespace App\Dto;

use App\RendezVous as AppRendezVous;
use Spatie\DataTransferObject\DataTransferObject;
Class RendezVous extends DataTransferObject
{
    public $title;
    public $start;
    public $end;
    public $url;
    public $backgroundColor;
    public $borderColor;

    public static function fromModel(AppRendezVous $rendezvous): RendezVous
    {
        return new static([
            'title'=>$rendezvous->patient->name.' '.$rendezvous->patient->lastname,
            'start'=>date('c',strtotime($rendezvous->date.' '.date('H:i:s',strtotime("-60 minutes",strtotime($rendezvous->time))))),
            'end'=>date('c',strtotime($rendezvous->date.' '.date('H:i:s',strtotime("-30 minutes",strtotime($rendezvous->time))))),
            'url'=>url("/patients/{$rendezvous->patient->id}"),
            'backgroundColor'=>'#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT),
            'borderColor'=>'#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT),
        ]);
    }
}
