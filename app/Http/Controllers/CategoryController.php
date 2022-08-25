<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function list(){
        $data = Category::all();
        return view('backend.category.list',compact('data'));
    }

    public function add(Request $req){
        $req->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);

        $filename = time().'.'.$req->file('image')->getClientOriginalExtension();
        $req->file('image')->move('category',$filename);
        $cat = new Category();
        $cat->name = $req->name;
        $cat->description = $req->description;
        $cat->image = $filename;
        $cat->save();
        $req->session()->flash('message','Category Inserted');
        return redirect()->back();
    }

    public function show()
    {
        return view('backend.category.show');
    }

    public function edit($id)
    {
        $data = Category::find($id);
        return view('backend.category.edit',compact('data'));

    }

    public function update(Request $req)
    {
        if($req->has('image'))
        {
            $filename = time().'.'.$req->file('image')->getClientOriginalExtension();
            $req->file('image')->move('category',$filename);

            Category::where('id',$req->id)->update([
                'name' => $req->name,
                'description' => $req->description,
                'image' => $filename
            ]);

        }
        else
        {
            
            Category::where('id',$req->id)->update([
                'name' => $req->name,
                'description' => $req->description
            ]);
        }
        $req->session()->flash('message','Updated');
        return redirect()->back();

    }

    public function delete($id,Request $req)
    {
        $result = Category::where('id',$id)->delete();
        if($result)
        {
            $req->session()->flash('message','Data Deleted');
            return redirect()->route('category.list');
        }
        else{
            $req->session()->flash('message','Data Not Deleted');
            return redirect()->route('category.list');
        }
    }
}
