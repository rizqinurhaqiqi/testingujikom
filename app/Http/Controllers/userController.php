<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Auth;
class userController extends Controller
{
    public function index(){
        $id = Auth::user()->id;
        $user = User::find($id);



        return view('user.profile',compact('user'));
    }
    public function update(Request $request , $id){
            $user = User::find($id);

            $user->update($request->all());
         if ($request->hasFile('foto')){
             $request->file('foto')->move('foto/',$request->file('foto')->getClientOriginalName());
             $user->foto = $request->file('foto')->getClientOriginalName();
             $user->save();
         }
            return redirect ('/profile');
    }
}
