<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    public function list(){
        $data = Banner::all();
        return view('backend.banner.list',compact('data'));
    }

    public function add(Request $req){
        $req->validate([
            'image' => 'required',
            'status' => 'required'
        ]);

        $filename = time().'.'.$req->file('image')->getClientOriginalExtension();
        $req->file('image')->move('banner',$filename);
        $cat = new Banner();
        $cat->image = $filename;
        $cat->status = $req->status;
        $cat->save();
        $req->session()->flash('message','Banner Inserted');
        return redirect()->back();
    }

    public function show()
    {
        return view('backend.banner.show');
    }

    public function edit($id)
    {
        $data = Banner::find($id);
        return view('backend.banner.edit',compact('data'));

    }

    public function update(Request $req)
    {
        if($req->has('image'))
        {
            $filename = time().'.'.$req->file('image')->getClientOriginalExtension();
            $req->file('image')->move('banner',$filename);

            Banner::where('id',$req->id)->update([
                'status' => $req->status,
                'image' => $filename
            ]);

        }
        else
        {
            
            Banner::where('id',$req->id)->update([
                'status' => $req->status,
            ]);
        }
        $req->session()->flash('message','Updated');
        return redirect()->back();

    }

    public function delete($id,Request $req)
    {
        $result = Banner::where('id',$id)->delete();
        if($result)
        {
            $req->session()->flash('message','Data Deleted');
            return redirect()->route('banner.list');
        }
        else{
            $req->session()->flash('message','Data Not Deleted');
            return redirect()->route('banner.list');
        }
    }
}
