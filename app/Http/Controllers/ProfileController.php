<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    public function index(){
        return view('profile');
    }
    /**
     * Get a validator for an incoming editing request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function edit(Request $request){
        $request->validate([
            'lastname' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        DB::table('users')
                            ->where('id','=',$request->id)
                            ->update(['name'=>$request->name,'lastname'=>$request->lastname,'password'=>Hash::make($request->password)]);
        return redirect()->route('profile');

    }
    public function store_image(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imagename=$request->image->hashName();
        $request->file('image')->store('images/profils','public');
        DB::update('update users set imagepath = "'.$imagename.'"where id = ?', [Auth::user()->id]);
        $request->session()->flash('success','You have successfully upload an image.');
        return back();
    }
}
