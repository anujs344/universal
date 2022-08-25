<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminContorller extends Controller
{
    public function showdashboard(){
        return view('backend.index');
    }

    
}
