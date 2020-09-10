<?php

namespace App\Http\Controllers;

use App\Rencontre;
use App\Patient;
use Carbon\Traits\Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RencontreController extends Controller
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

    }

    /**
     * Display a listing of meeting of specific patient.
     *
     * @return \Illuminate\Http\Response
     */
    public function list( Request $request)
    {
        //
        $id =$request->id;
        $data= Rencontre::where('patient_id','=',$id)->where('user_id','=',Auth::user()->id)->orderBy('date', 'asc')->paginate(1);
        $data->withpath('?id='.$id);
        $patient=DB::table('patients')->where('id','=',$id)->get();
        return view('rencontres.index',['data'=> $data,'patient'=>$patient]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('rencontres.create');
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
        'type_contact' =>'required',
        'donnees_significatives' =>'required',
        'conclusion' =>'required',
        'decisions' =>'required',
        ]);        $contact = new Rencontre([
            'date' => date('Y-m-d'),
            'type_contact' => $request->get('type_contact'),
            'donnees_significatives' => $request->get('donnees_significatives'),
            'conclusion' => $request->get('conclusion'),
            'decisions' => $request->get('decisions'),
            'patient_id'=>$request->get('patient_id'),
            'user_id' => Auth::user()->id,
        ]);
        $contact->save();
        return redirect ('patients/'.$request->get('patient_id').'/rencontres')->with('success', 'Meeting saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rencontre  $rencontre
     * @return \Illuminate\Http\Response
     */
    public function show(Rencontre $rencontre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rencontre  $rencontre
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $rencontre=Rencontre::find($id);
        return view('rencontres.create',['rencontre'=>$rencontre]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rencontre  $rencontre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rencontre $rencontre)
    {
        //
        $request->validate([
            'type_contact' =>'required',
            'donnees_significatives' =>'required',
            'conclusion' =>'required',
            'decisions' =>'required',
            ]);
        $rencontre->type_contact=$request->get('type_contact');
        $rencontre->donnees_significatives=$request->get('donnees_significatives');
        $rencontre->conclusion=$request->get('conclusion');
        $rencontre->decisions=$request->get('decisions');
        $rencontre->save();
       return redirect('/patients/'.$rencontre->patient->id.'/rencontres')->with('success', 'Meeting updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rencontre  $rencontre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rencontre $rencontre )
    {
        //
        $rencontre->delete();
        return redirect()->back()->with('success', 'Meeting deleted!');
    }
}
