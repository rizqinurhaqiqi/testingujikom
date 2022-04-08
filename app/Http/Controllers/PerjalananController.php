<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\perjalanan;
use Illuminate\Http\Request;

class PerjalananController extends Controller
{
    public function index(){
        $item = Auth::user()->id;

        $user = User::find($item);
        return view('perjalanan.index',compact('user'));
    }
    public function create(Request $request){

        $id = Auth::user()->id;

        perjalanan::create([
            'suhu_tubuh'=>$request->suhu_tubuh,
            'jam'=>$request->jam,
            'tanggal'=>$request->tanggal,
            'lokasi'=>$request->lokasi,
            'user_id'=>$id,
        ]);

        return redirect('/perjalanan');
    }
    public function delete( $id){
        $item = Perjalanan::find($id);
        $item->delete();

        return redirect('/perjalanan');
    }
}
