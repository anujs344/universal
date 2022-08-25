<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class WishlistController extends Controller
{
    public function show(){
        $wishlist = Wishlist::where('user_id',Auth::user()->id)->get();
        
        return view('frontend.wishlist.index',compact('wishlist'));
    }
    public function add(Request $req){
        if(Wishlist::where('user_id',Auth::user()->id)->where('product_id',$req->product_id)->exists())
        {
            $value = Wishlist::where('user_id',Auth::user()->id)->where('product_id',$req->product_id)->first();
            Wishlist::where('user_id',Auth::user()->id)->where('product_id',$req->product_id)->update([
                'quantity' => $value->quantity +1
            ]);
            return redirect()->back();

        }
        $cart = new Wishlist();
        $cart->product_id = $req->product_id;
        $cart->user_id = Auth::user()->id;
        $cart->quantity = 1;
        $cart->save();
        $req->session()->flash('message','Added to Wishlist');

        return redirect()->back();
    }

    public function delete(Request $req,$id){
        Wishlist::where('id',$id)->delete();
        $req->session()->flash('message','Deleted From Cart');
        return redirect()->route('wishlist.show');
    }

    public function addtocart($id,Request $req)
    {
        $data = Wishlist::find($id);
        if(Cart::where('user_id',$data->user_id)->where('product_id',$data->product_id)->exists())
            {

                $old = Cart::where('user_id',$data->user_id)->where('product_id',$data->product_id)->first();
                Cart::where('user_id',$data->user_id)->where('product_id',$data->product_id)->update([
                    'quantity' => $old->quantity + $data->quantity
                ]);
            }
        else{

            $c = new Cart();
            $c->product_id = $data->product_id;
            $c->quantity = $data->quantity;
            $c->user_id = $data->user_id;
            $c->save();
        }

        $data->delete();
        $req->session()->flash('message','Added to cart');
        return redirect()->route('wishlist.show');
    }

    public function addalltocart(Request $req)
    {
        $data = Wishlist::where('user_id',Auth::user()->id)->get();
        foreach($data as $d)
        {
            if(Cart::where('user_id',$d->user_id)->where('product_id',$d->product_id)->exists())
            {
                $old = Cart::where('user_id',$d->user_id)->where('product_id',$d->product_id)->first();
                Cart::where('user_id',$d->user_id)->where('product_id',$d->product_id)->update([
                    'quantity' => $old->quantity + $d->quantity
                ]);
                $d->delete();
            }
            else{

                $c = new Cart();
                $c->product_id = $d->product_id;
                $c->quantity = $d->quantity;
                $c->user_id = $d->user_id;
                $c->save();
                $d->delete();
            }

        }
        $req->session()->flash('message',' All Added to cart');
        return redirect()->route('wishlist.show');

    }
}
