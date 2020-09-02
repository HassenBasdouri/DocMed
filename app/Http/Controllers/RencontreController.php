<?php

namespace App\Http\Controllers;

use App\Rencontre;
use App\Patient;
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
    public function index()
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
        $data= DB::table('rencontres')->where('patient_id','=',$id)->where('user_id','=',Auth::user()->id)->orderBy('date', 'asc')->paginate(1);
        $user=DB::table('users')->where('id','=',$id)->get();
        return view('rencontres',['data'=> $data,'user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function edit(Rencontre $rencontre)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rencontre  $rencontre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rencontre $rencontre)
    {
        //
    }
}
