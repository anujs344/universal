<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contactus;

class ContactusController extends Controller
{
    public function show()
    {
        return view('frontend.contactus.contactus');
    }
    public function create(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'email' =>'required',
            'subject' =>'required',
            'message' => 'required'
        ]);

        $cu = new Contactus();
        $cu->name = $req->name;
        $cu->email =  $req->email;
        $cu->subject = $req->subject;
        $cu->message = $req->message;
        $cu->save();
        
        $req->session()->flash('message','Thank you for Contacting Us');
        return redirect()->back();
    }
}
