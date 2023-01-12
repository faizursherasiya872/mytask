<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductControler extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('insert');
    }
    public function insert(Request $request)
    {
        // validation mate
        $request->validate(
            [
                'name' => 'required',
                'price' => 'required',
                'upc' => 'required',
                'image' => 'required'
            ]
        );
         echo "<pre>";
         print_r($request->all());
// for insert
             $product = new Product;
             $product->name = $request['name'];
             $product->price = $request['price'];
             $product->upc = $request['upc'];

             if($request->hasfile('image'))
             {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('img', $filename);
                $product->image = $filename;
             }

             $product->save();

                return redirect('/home');
    }
    // Data show query
     public function view(){
         $product = Product::all();
         $data = compact('product');
         return view('test')->with($data);
     }
// Edit data show
     public function edit($id)
     {
        $product = Product::find($id);
        if(!is_null($product))
        {
         $data = compact('product');
         return view('edit-form')->with($data);
        }else
        {
             return redirect('/home');
        }
     }
// Update Data
     public function update(Request $request)
    {
        $product = Product::find($request->id);
        $product->name = $request['name'];
        $product->price = $request['price'];
        $product->upc = $request['upc'];
        if($request->hasfile('image'))
             {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('img', $filename);
                $product->image = $filename;
             }
        $product->save();

        return redirect('/home');
    }
// Delete Data
    public function delete(Request $request)
    {
        $ids = $request->ids;

        Product::whereIn('id', $ids)->delete();

        return redirect()->back();
    }
}
