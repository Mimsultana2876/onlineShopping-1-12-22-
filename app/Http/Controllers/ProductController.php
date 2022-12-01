<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductDetails;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.addPro',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array(
            'p_name' => $request->p_name,
            'category_id' => $request->category_id,
            'p_price' => $request->p_price
            
        );
        if($request->hasFile('p_image')){
            $image = $request->file('p_image');
            $fileName = date('dmY').time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path("/uploads"),$fileName);
            $data['p_image'] = $fileName;

        }
        $create = Product::create($data);
        return redirect()->route('product.create')->with('message', 'inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product,Request $request)
    {
        $id = $request->id;
        $product = Product::findOrFail($id);
        $categories = Category::get();
        return view('admin.product.editPro',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $id = $request->id;
        $data = array(
            'p_name' => $request->p_name,
            'category_id' => $request->category_id,
            'p_price' => $request->p_price
            
        );
        if($request->hasFile('p_image')){
            $image = $request->file('p_image');
            $fileName = date('dmY').time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path("/uploads"),$fileName);
            $data['p_image'] = $fileName;

        }
        $create = Product::where('id',$id)->update($data);
        return redirect()->route('product.list')->with('message','update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $product = product::find($id);
        $product->delete();
        return redirect('product/index')->with('message','delete');
    }

    public function extraDetails(Request $request){
        $id = $request->id;
        $product = Product::where('id',$id)->with('ProductDetail')->first();
        return view('admin.product.extraDetails',compact('id','product'));
    }

    public function extraDetailsStore(Request $request){
        $id = $request->id;
        $data = array(
            'title' => $request->title,
            'product_id'=> $id,
            'total_items' => $request->total_items,
            'description' => $request->description
            
        );
        $details = ProductDetails::updateOrcreate(
            ['product_id' => $id],
            $data

        );
        return redirect()->route('product.list')->with('message', 'add');
    }

    
}
