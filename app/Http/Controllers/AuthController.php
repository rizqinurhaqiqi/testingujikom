<?php
namespace App\Http\Controllers;
use App\User;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function home()
    {
        return view('dashboard.home');
    }

    public function formregis(){
        return view('auth.register');
    }
    public function login(){


        return view('auth.login');
    }
    public function postlogin(Request $request ){

        if (Auth::attempt($request->only('email','password'))){

            return redirect('/home' );
        }
        return redirect('/login');
    }
    // public function regis(Request $request){
    //     Auth::create([
    //         'name' = $request->name,
    //     ]);
    // }
    public function logout () {

        auth()->logout();
        return redirect('/login');
    }
    public function regis(Request $request){


        $this->validate($request, [

            'password' => 'nullable|required_with:password_confirmation|string|confirmed',

        ]);

        User::create([
            'alamat'=>$request->alamat,
            'role'=> ('user'),
            'nik' => $request->nik,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => str_random(60)
        ]);
        return redirect('/login');
    }
}

