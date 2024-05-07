<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        
        // print_r($products);die;
        return view('Frontend.home', compact('products'));
    }
    public function show($id)
    {
        $product = Product::findOrFail($id); 

        return view('FrontEnd.product.show', compact('product'));
    }





}

    
