<?php

namespace App\Http\Controllers;

use App\Document;
use App\Http\Requests\PatientForm;
use App\Image;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
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
        $data= DB::table('patients')->orderBy('name', 'asc')->paginate(5);
        return view('patients.index',['data'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientForm $request)
    {
        //

        $request->validate([
            'name' => 'required|min:3',
            'lastname' => 'required|min:3',
            'cin' => 'required|numeric',
            'birth' => 'required|date',
            'phone' => 'required',
            'profession' => 'required|max:60|min:5',
            'cnam' => 'required|max:14|min:8',
        ]);

        $patient = new Patient();
        $patient->name = $request->get('name');
        $patient->lastname = $request->get('lastname');
        $patient->cin = $request->get('cin');
        $patient->birth =$request->get('birth');
        $patient->phone = $request->get('phone');
        $patient->profession = $request->get('profession');
        $patient->cnam = $request->get('cnam');
        $patient->save();
        return redirect('/patients')->with('success', 'Patient saved!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
        return view('patients.show',['patient'=>$patient]);
    }
     /**
     * Search the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        //
        $search=$request->get('search');
        $patients = DB::table('patients')
                                        ->where('name','like','%'.$search.'%')
                                        ->orWhere('cin','like','%'.$search.'%')
                                        ->orWhere('lastname','like','%'.$search.'%')
                                        ->orWhere('cnam','like','%'.$search.'%')
                                        ->orderBy('name', 'asc')
                                        ->get();
        return json_encode($patients);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $patient=Patient::find($id);
        return view('patients.create',compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(PatientForm $request, Patient $patient)
    {
        //
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'cin' => 'required|numeric',
            'birth' => 'required|date',
            'phone' => 'required',
            'profession' => 'required|max:60|min:5',
            'cnam' => 'required|max:14|min:8',
        ]);
            $patient->name = $request->get('name');
            $patient->lastname = $request->get('lastname');
            $patient->cin = $request->get('cin');
            $patient->birth =$request->get('birth');
            $patient->phone = $request->get('phone');
            $patient->profession = $request->get('profession');
            $patient->cnam = $request->get('cnam');
        $patient->save();
       return redirect('/patients/'.$patient->id)->with('success', 'Patient updated!');

    }
    public function show_images($id){
        $patient=Patient::find($id);
        $images=Image::where('patient_id','=',$id)->get();
        return view('patients.show_image',['images'=>$images,'patient'=>$patient]);
    }
    public function show_documents($id){
        $patient=Patient::find($id);
        $documents=Document::where('patient_id','=',$id)->get();
        return view('patients.show_documents',['documents'=>$documents,'patient'=>$patient]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
