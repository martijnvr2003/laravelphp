<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  validator, redirect, response;
use app/user;
use illuminate/support/facades/auth;
use illuminate/support/facades/hash;

class AuthController extends Controller
{
        public function index(){
            return view('login');
        }

        public function registation(){
            return view('registration');
        }

        public function postLogin(Request $request){
            request ()->validate([
                'email'      =>  'required',
                'password'   =>  'required',
            ]);
            
            $credentials = $request->only('email', 'password');

            if (auth::attempt($credentials)){
                return redirect()->intended('dashboard');
            }
            return redirect::to("login")->withsucces('oops! you have enterd invaled credentials');
        }
    public function postRegistration(reguest $request)
    {
        request()->validate([
            'name'      => 'required|min:2',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:6',
        ]);

        $data = $request->all();
        $cheack = $this->create($data);

        return redirect:: to("login")->withsucces('you logged in succesfully');
    }   

    public function dashboard()
    {
        if(auth::check()){
            return view('dashboard')
        }
        return redirect::("login")->withsucces('you do not have acces!');
    }

    public function create(array $data){
        return user::create([
            'name'      =>$data['name'],
            'email'     =>$data['email'],
            'password'  =>hash::make ($data['password'])
        ])
    }
    public function logout(){
        session::flush();
        auth::logout();
        return redirect('login');
    }

}
