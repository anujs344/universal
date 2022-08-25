<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    
    public function show()
    {
        return view('backend.login');
    }
    public function check(Request $request)
    {
           
        if(Auth::attempt(['email' => $request->email,'password' => $request->password,'role' => '1'])){
            $request->session()->flash('message',"Admin Login Successfully");
            return redirect()->route('Admin.Dashboard');
        }
        $request->session()->flash('message',"Admin Login Failed");

        return redirect()->back();
    }
}
