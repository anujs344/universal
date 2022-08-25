<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CareerCategory;

class CareerCategoryController extends Controller
{
    public function list(){
        $data = CareerCategory::all();
        return view('backend.careercategory.list',compact('data'));
    }


    public function show()
    {
        return view('backend.careercategory.show');
    }
    public function add(Request $req)
    {
        $req->validate([
            'name' => 'required',
        ]);

        $cc = new CareerCategory();
        $cc->name = $req->name;
        $cc->save();

        $req->session()->flash('message','Category Added');
        return redirect()->back();
    }

    public function delete(Request $req,$id)
    {
        $cc = CareerCategory::find($id);
        $cc->delete();
        if($cc)
        {

            $req->session()->flash('message','Category Deleted');
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
        $data = CareerCategory::find($id);
        return view('backend.careercategory.edit',compact('data')); 
    }

    public function update(Request $req)
    {
        $req->validate([
            'name' => 'required'
        ]);
        CareerCategory::where('id',$req->id)->update([
            'name' => $req->name
        ]);

        $req->session()->flash('message','updated');
            return redirect()->back();
    }
}
