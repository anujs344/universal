<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CareerCategory;
use App\Models\AvailableCareers;
use Illuminate\Console\Application;
use App\Models\applications;
use Illuminate\Support\Facades\Auth;

class CareerController extends Controller
{
    public function show()
    {
        $category = CareerCategory::all();
        $data = AvailableCareers::all();
        return view('frontend.career.show',compact('category','data'));
    }

    public function add(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'number' => 'required',
            'email' => 'required',
            'image' => 'required'
        ]);

        $filename = time().'.'.$req->file('image')->getClientOriginalExtension();
        $req->file('image')->move('resume',$filename);
        $app = new applications();
        $app->name = $req->name;
        $app->number = $req->number;
        $app->email = $req->email;
        $app->user_id = Auth::user()->id;
        $app->career_id = $req->career_id;
        $app->image = $filename;
        $app->save();

        $req->session()->flash('message','Application Submitted');
        return redirect()->back();
    }

    public function filter(Request $req)
    {
        $category = CareerCategory::all();
        $data = AvailableCareers::where('category_id',$req->filterby)->get();
        return view('frontend.career.show',compact('category','data'));
    }

    
}
