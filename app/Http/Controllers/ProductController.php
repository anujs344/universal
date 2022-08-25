<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function list(){
        $data = Product::all();
        return view('backend.product.list',compact('data'));
    }

    public function add(Request $req){
        $req->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'weight' => 'required',
            'unit'=>'required',
            'status' => 'required',
            'showontop' => 'required'
        ]);

        $filename = time().'.'.$req->file('image')->getClientOriginalExtension();
        $req->file('image')->move('product',$filename);
        $p = new Product();
        $p->name = $req->name;
        $p->category_id = $req->category_id;
        $p->description = $req->description;
        $p->image = $filename;
        $p->price = $req->price;
        $p->discount = $req->discount;
        $p->weight = $req->weight;
        $p->unit = $req->unit;
        $p->status = $req->status;
        $p->showontop = $req->showontop;
        $p->save();
        $req->session()->flash('message','Product Inserted');
        return redirect()->back();
    }

    public function show()
    {
        $category = Category::all();
        return view('backend.product.show',compact('category'));
    }

    public function edit($id)
    {
        $data = Product::find($id);
        $category = Category::all();
        return view('backend.product.edit',compact('data','category'));

    }

    public function update(Request $req)
    {
        if($req->has('image'))
        {
            $filename = time().'.'.$req->file('image')->getClientOriginalExtension();
            $req->file('image')->move('product',$filename);

            Product::where('id',$req->id)->update([
                'name' => $req->name,
                'description' => $req->description,
                'image' => $filename,
                'category_id' => $req->category_id,
                'price' => $req->price,
                'discount' => $req->discount,
                'weight' => $req->weight,
                'unit' => $req->unit,
                'status' => $req->status,
                'showontop' => $req->showontop,
            ]);

        }
        else
        {
            
            Product::where('id',$req->id)->update([
                'name' => $req->name,
                'description' => $req->description,
                'category_id' => $req->category_id,
                'price' => $req->price,
                'discount' => $req->discount,
                'weight' => $req->weight,
                'unit' => $req->unit,
                'status' => $req->status,
                'showontop' => $req->showontop,

            ]);
        }
        $req->session()->flash('message','Updated');
        return redirect()->back();

    }

    public function delete($id,Request $req)
    {
        $result = Product::where('id',$id)->delete();
        if($result)
        {
            $req->session()->flash('message','Data Deleted');
            return redirect()->route('product.list');
        }
        else{
            $req->session()->flash('message','Data Not Deleted');
            return redirect()->route('product.list');
        }
    }
}
