<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AvailableCareers;
use App\Models\CareerCategory;
use App\Models\applications;

class AvailableCareersController extends Controller
{
    public function list(){
        $data = AvailableCareers::all();
        return view('backend.career.list',compact('data'));
    }


    public function show()
    {
        $category  = CareerCategory::all();
        return view('backend.career.show',compact('category'));
    }
    public function add(Request $req)
    {
        $req->validate([
            'title' => 'required',
            'experience' => 'required',
            'location' => 'required',
            'vacancy' => 'required',
            'lastdate' => 'required',
            'category_id' => 'required',
            'roles' => 'required',
            'requirements' => 'required',
        ]);

        $cc = new AvailableCareers();
        $cc->title = $req->title;
        $cc->experience = $req->experience;
        $cc->location = $req->location;
        $cc->vacancy = $req->vacancy;
        $cc->category_id = $req->category_id;
        $cc->lastedate = $req->lastdate;
        $cc->roles = $req->roles;
        $cc->requirements = $req->requirements;
        $cc->save();

        $req->session()->flash('message','Category Added');
        return redirect()->back();
    }

    public function delete(Request $req,$id)
    {
        $cc = AvailableCareers::find($id);
        $cc->delete();
        if($cc)
        {

            $req->session()->flash('message','Career Deleted');
            return redirect()->back();
        }
        else
        {

            $req->session()->flash('message','internal error');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $data = AvailableCareers::find($id);
        $category  = CareerCategory::all();

        return view('backend.career.edit',compact('data','category')); 
    }

    public function update(Request $req)
    {
        $req->validate([
            'title' => 'required',
            'experience' => 'required',
            'location' => 'required',
            'vacancy' => 'required',
            'lastdate' => 'required',
            'category_id' => 'required',
            'roles' => 'required',
            'requirements' => 'required',
        ]);
        AvailableCareers::where('id',$req->id)->update([
            'title' => $req->title,
            'experience' => $req->experience,
            'location' => $req->location,
            'vacancy' => $req->vacancy,
            'category_id' => $req->category_id,
            'lastedate' => $req->lastdate,
            'roles' => $req->roles,
            'requirements' => $req->requirements
        ]);

        $req->session()->flash('message','updated');
            return redirect()->back();
    }

    public function showform($id)
    {
        $data = applications::where('career_id',$id)->get();
        return view('backend.career.form',compact('data'));
    }
    public function deleteform($id)
    {
        $req->session()->flash('message','Deleted');

        applications::where('id',$id)->delete();
        return redirect()->back();
    }
}
