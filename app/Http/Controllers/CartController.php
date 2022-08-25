<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Offer;
use App\Models\Address;
use App\Models\Order;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public function show(){
        $cart = Cart::where('user_id',Auth::user()->id)->get();
        $total = 0;
        foreach($cart as $item)
        {
            $total += ((100-$item->product->discount)*$item->product->price/100)*$item->quantity;
        }
        return view('frontend.cart.index',compact('cart','total'));
    }
    public function add(Request $req){
        if(Cart::where('user_id',Auth::user()->id)->where('product_id',$req->product_id)->exists())
        {
            $value = Cart::where('user_id',Auth::user()->id)->where('product_id',$req->product_id)->first();
            Cart::where('user_id',Auth::user()->id)->where('product_id',$req->product_id)->update([
                'quantity' => $value->quantity +1
            ]);
            return redirect()->back();

        }
        $cart = new Cart();
        $cart->product_id = $req->product_id;
        $cart->user_id = Auth::user()->id;
        $cart->quantity = 1;
        $cart->save();
        $req->session()->flash('message','Added to Cart');

        return redirect()->back();
    }

    public function delete(Request $req,$id){
        $cart = Cart::where('id',$id)->delete();
        $req->session()->flash('message','Deleted From Cart');
        return redirect()->route('cart.show');
    }

    public function increasequantity($id)
    {
        $value = Cart::find($id);
        Cart::where('id',$id)->update([
            'quantity' => $value->quantity + 1
        ]);
        $req->session()->flash('message','Increased');

        return redirect()->route('cart.show');
    }
    public function decreasequantity(Request $req,$id)
    {
        $value = Cart::find($id);
        if($value->quantity == 1)
        {
            $req->session()->flash('message','Cant Decrease');
            return redirect()->back();
        }
        Cart::where('id',$id)->update([
            'quantity' => $value->quantity -1 
        ]);
        $req->session()->flash('message','Decreased');

        return redirect()->route('cart.show');
    }

    public function checkout(Request $req)
    {
        if($req->code != null)
        {
            if(Offer::where('code',$req->code)->exists())
            {
                $code = Offer::where('code',$req->code)->get();
                if($req->total > $code->min)
                {
                    $total = (100- $code->discount)*$req->total/100;
                    $discount = $req->total - $total;

                }
                else{
                    $total = $req->total;
                    $discount = 0;
                }
            }
            else
            {
                $total = $req->total;
                $discount = 0;
            }

        }
        else
        {
            $total = $req->total;
            $discount= 0;
        }
        $cart = $req->cart;
        return view('frontend.cart.checkout',compact('total','discount','cart'));
    }

    public function placeorder(Request $req)
    {
        //condition for payment
        //if payment successfull
        //redirecting api
        $orderdetails = array();
        $req->cart = json_decode($req->cart, true);


        // dd($car);
        $ad = new Address();
        $ad->name = $req->name;
        $ad->number = $req->number;
        $ad->email = $req->email;
        $ad->address = $req->address;
        $ad->state = $req->state;
        $ad->pincode = $req->pincode;
        $ad->city = $req->city;
        $ad->user_id = Auth::user()->id;
        
        $ad->save();
        $track = $this->generatenumner(Str::random(10));

        foreach($req->cart as $item)
        {
            $order = new Order();
            $order->product_id = $item["product"]["id"];
            $order->user_id = Auth::user()->id;
            $order->address_id = $ad->id;
            $order->quantity = $item["quantity"];
            $order->cart_id = $item["id"];
            $order->payment = $req->payment;
            $order->track_id = $track;
            $order->total = $req->total;

            $order->save();

            Address::where('id',$ad->id)->update([
                'order_id' => $order->id
            ]);
            array_push($orderdetails,$order->id);
        }
        $req->session()->flash('message','Order Has Been Placed');
        return redirect()->route('user.trackorder',['orderdetails'=>$orderdetails]);
    }

    public function generatenumner($track)
    {
        if(Order::where('track_id',$track)->exists())
        {
            $this->generatenumner(Str::random(10));
        }
        else
        {
            return $track;
        }
        
    }

    public function trackorder(Request $req)
    {
        // dd(count($req->orderdetails));
        $condition = [];
        $i = 0;
        while($i<2)
        {
            
            array_push($condition, ['id'=> $req->orderdetails[$i]]);
            $i = $i+1;
        }
        // dd($condition[0]);
        $order = Order::where('id',$condition[0])->first();
        return view('frontend.cart.trackorder',compact('order'));
        
    }

}

