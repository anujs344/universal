<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MediaCoverage;

class MediaCoverageController extends Controller
{
    public function list(){
        $data = MediaCoverage::all();
        return view('backend.media.list',compact('data'));
    }

    public function add(Request $req){
        $req->validate([
            'url' => 'required',
            'status' => 'required',
            
        ]);

        
        $off = new MediaCoverage();
        $off->url = $req->url;
        $off->status = $req->status;
        $off->save();
        $req->session()->flash('message','Media Inserted');
        return redirect()->back();
    }

    public function show()
    {
        return view('backend.media.show');
    }

    public function edit($id)
    {
        $data = MediaCoverage::find($id);
        return view('backend.media.edit',compact('data'));

    }

    public function update(Request $req)
    {
            
            MediaCoverage::where('id',$req->id)->update([
                'url' => $req->url,
                'status' => $req->status,
            ]);
        
        $req->session()->flash('message','Updated');
        return redirect()->back();

    }

    public function delete($id,Request $req)
    {
        $result = MediaCoverage::where('id',$id)->delete();
        if($result)
        {
            $req->session()->flash('message','Data Deleted');
            return redirect()->route('media.list');
        }
        else{
            $req->session()->flash('message','Data Not Deleted');
            return redirect()->route('media.list');
        }
    }
}
