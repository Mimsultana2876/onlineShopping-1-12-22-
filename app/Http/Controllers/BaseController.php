<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\Cart;
use Hash;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
    public function home(){
        $products = Product::get();
        $new_products = Product::limit(8)->latest()->get();
        $categories = Category::get();
        $subcategories = SubCategory::where('category_id','!=',NULL)->get();
        return view('front.home',compact('products','new_products','categories','subcategories'));
    }

    public function cart(){
        $carts = cart::get();
        $products = Product::get();
        $new_products = Product::limit(8)->latest()->get();
        $categories = Category::get();
        $subcategories = SubCategory::where('category_id','!=',NULL)->get();
        return view('front.cart',compact('products','new_products','categories','subcategories','carts'));
    }

    public function detailView(Request $request){
        $id = $request->id;
        $categories = Category::get();
        $subcategories = SubCategory::where('category_id','!=',NULL)->get();
        $product = Product::where('id', $id)->with('ProductDetail')->first();
        return view('front.detailView',compact('categories','subcategories','product'));
    }

    public function userLogin(){
        $categories = Category::get();
        $subcategories = SubCategory::where('category_id','!=',NULL)->get();
        return view('front.login',compact('categories','subcategories'));
    }

    public function loginCheck(Request $request){
        
        $data = array(
           'name' => $request->name,
           'email' => $request->email,
           'password' => $request->password,
          
        );
        if (Auth::attempt($data)){
            return redirect()->route('front.home')->with('message', 'inserte');
        }else{
            return back()->with(['message','fail']);
        }

      
    }
   
    public function user_store(Request $request){
         // Form validation
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);
        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user'
        );

        $user = User::create($data);
        return redirect()->route('userLogin')->with('message', 'insertedReg');
    }

  

   
}
