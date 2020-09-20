<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Rencontre;
use App\RendezVous;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $countPatient = Patient::count();
        $allRencontre=RendezVous::count();
        $countRendezvous=RendezVous::where('user_id','=',Auth::user()->id)->count();
        return view('dashboard',['number'=>$countPatient,'numberRencontre'=> round($allRencontre/$countRendezvous,2)]);
    }
}
