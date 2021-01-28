<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    function index(){
        return view('contact');
    }

    public function ContactRequest(Request $request){
        return view('contact_succes',[
            'voornaam' => $request->input('first_name')
        ]);
    }
}
