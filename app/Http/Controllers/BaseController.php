<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class BaseController extends Controller
{
    public function home(){
        $products = Product::get();
        $new_products = Product::limit(8)->latest()->get();
        return view('front.home',compact('products','new_products'));
    }
}
