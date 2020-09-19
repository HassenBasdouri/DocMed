<?php

namespace App\Http\Controllers;

use App\Dto\RendezVous as DtoRendezVous;
use App\Patient;
use App\RendezVous;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class RendezVousController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $day = $request->get('day');
        $data = RendezVous::where('user_id', '=', Auth::user()->id)->where('date', '=', date('Y-m-d'))->orderBy('time', 'asc')->paginate(6);
        return view('rendezvous.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $patients = Patient::all();
        return view('rendezvous.create', ["patients" => $patients]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'date' => "required"
        ]);
        $rendezvous = new RendezVous([
            'date' => $request->get('date'),
            'time' => $request->get('time'),
            'patient_id' => $request->get('patient_id'),
            'user_id' => Auth::user()->id,
        ]);
        $max=strtotime("+15 minutes",strtotime($rendezvous->time));
        $min=strtotime("-15 minutes",strtotime($rendezvous->time));
         $data = RendezVous::where('user_id', '=', Auth::user()->id)
            ->where('date', '=', $rendezvous->date)
            ->where('time', '>=', date('H:i:s', $min))
            ->where('time','<=',date('H:i:s', $max))
            ->get();
        if (count($data)) {
            return redirect('/rendezvous/create')->with('danger', 'Unregistered appointment! You shoud respect an interval of 30 minutes (± 15 minutes) between appointments.');
        }
        $rendezvous->save();
        return redirect('/rendezvous')->with('success', 'Appointment saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RendezVous  $rendezVous
     * @return \Illuminate\Http\Response
     */
    public function show(RendezVous $rendezVous)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RendezVous  $rendezVous
     * @return \Illuminate\Http\Response
     */
    public function edit(RendezVous $rendezVous)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RendezVous  $rendezVous
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RendezVous $rendezVous)
    {
        //
    }
    public function search(Request $request)
    {
        $id=Auth::user()->id;
        $events=RendezVous::where('user_id','=',$id)->get();
        $events->transform(function ($item, $key) {
            return DtoRendezVous::fromModel($item);
        });
        return json_encode($events);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RendezVous  $rendezVous
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $rendezVous = RendezVous::find($id);
        $rendezVous->delete();
        return redirect()->back()->with('success', 'Meeting deleted!');
    }
}
