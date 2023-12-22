<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('products.index');
    }
    public function create(){
        return view('products.create');
    }
    public function store(Request $request){
        // validation data 
        $request->validate([
            'name' => 'required',
            'descriptin' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000'
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('products'), $imageName);
    
        $product = new ProductController;
    
        $product->image = $imageName;
        $product->name = $request->name;
        $product->description = $request->description;
    
        // $product->save();
        // $product->save();
    
        return back();
    }
    
}
