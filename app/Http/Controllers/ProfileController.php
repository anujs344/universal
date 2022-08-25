<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class ProfileController extends Controller
{
    public function show()
    {
        return view('frontend.profile.show');
    }
    public function history($id = null)
    {
        if($id != null)
        {
            $order = Order::where('user_id',Auth::user()->id)->where('status',$id)->get();

        }
        else{
            $order = Order::where('user_id',Auth::user()->id)->get();

        }
        return view('frontend.profile.history',compact('order'));
    }

    public function trackorder(Request $req,$id = null)
    {
        if(isset($req->id)){
            $order = Order::where('track_id',$req->id)->first();
            return view('frontend.profile.trackorder',compact('order'));
        }
        else
        {
            return view('frontend.profile.trackorder');
        }
        
    }

    public function edit()
    {
        return view('frontend.profile.edit');
    }

    public function getcoupons()
    {

    }

    public function update(Request $req)
    {
        User::where('id',Auth::user()->id)->update([
            'name' => $req->name,
            'email' => $req->email,
            'number' => $req->number
        ]);

        $req->session()->flash('message','Sesion Has Been Updated');
        return redirect()->back();
    }
}

