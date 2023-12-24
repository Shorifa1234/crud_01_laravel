<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Assuming your model is named Product

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index',['products'=> Product::get()]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        // validation data
        $request->validate([
            'name' => 'required',
            'description' => 'required', // Corrected typo here
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000'
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('products'), $imageName);

        $product = new Product; // Create an instance of your model

        $product->image = $imageName;
        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();

        return back()->withSuccess('Product created successfully!');
    }
    public function edit($id)
     {
    $product = Product::find($id);
    return view('products.edit', ['product' => $product]);
     }
     public function update(Request $request,$id){
        // validation data
        $request->validate([
            'name' => 'required',
            'description' => 'required', // Corrected typo here
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000'
        ]);
        $product = Product::where('id',$id)->first();
         if(isset($request->image)){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('products'), $imageName);
            $product->image = $imageName;
         }

        
        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();

        return back()->withSuccess('Product updated successfully!');
    }
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return back()->withSuccess('Product deleted successfully!');
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show',['product'=>$product]);
        // return back()->withSuccess('Product deleted successfully!');
    }
}
