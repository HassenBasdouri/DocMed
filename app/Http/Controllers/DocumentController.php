<?php

namespace App\Http\Controllers;

use App\Document;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $patients = Patient::all();
        return view('new_docs', ['patients' => $patients]);
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
            'doc' => 'required|mimes:pdf,jpeg,png,jpg,gif,svg|max:9226',
            'description'=>'required',
            'patient_id'=>'required',
        ]);
        $docname = $request->doc->hashName();
        $request->file('doc')->store('doc', 'public');
        $doc= new Document(['path'=>$docname,
        'description'=>$request->get('description'),
        'patient_id'=>$request->get('patient_id'),
        'type'=>$request->get('type'),
        'libelle'=>$request->file('doc')->getClientOriginalName(),
        'user_id' => Auth::user()->id]);
        $doc->save();
        $request->session()->flash('success', 'You have successfully upload a document.');
        return redirect('patient/'.$request->get('patient_id').'/documents');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }
}
