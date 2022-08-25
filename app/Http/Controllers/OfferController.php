<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;

class OfferController extends Controller
{
    public function list(){
        $data = Offer::all();
        return view('backend.offer.list',compact('data'));
    }

    public function add(Request $req){
        $req->validate([
            'code' => 'required',
            'min' => 'required',
            'discount' => 'required'
        ]);

        
        $off = new Offer();
        $off->code = $req->code;
        $off->min = $req->min;
        $off->discount = $req->discount;
        $off->save();
        $req->session()->flash('message','Offer Inserted');
        return redirect()->back();
    }

    public function show()
    {
        return view('backend.offer.show');
    }

    public function edit($id)
    {
        $data = Offer::find($id);
        return view('backend.offer.edit',compact('data'));

    }

    public function update(Request $req)
    {
            
            Offer::where('id',$req->id)->update([
                'code' => $req->code,
                'min' => $req->min,
                'discount' => $req->discount
            ]);
        
        $req->session()->flash('message','Updated');
        return redirect()->back();

    }

    public function delete($id,Request $req)
    {
        $result = Offer::where('id',$id)->delete();
        if($result)
        {
            $req->session()->flash('message','Data Deleted');
            return redirect()->route('offer.list');
        }
        else{
            $req->session()->flash('message','Data Not Deleted');
            return redirect()->route('offer.list');
        }
    }
}
