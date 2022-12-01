<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        $this->validate($request,[
            "category_id" => "required",
            "subCategory_name" => "required|string|unique:sub_Categories",
        ],
        [
            'category_id.required'=> 'Please Select Category Type',
            'subCategory_name.required'=> 'Please Fill Sub Category',
        ]
    );
        //dd($request);
        $category_id = $request->category_id;
        $subCategory_name = $request->subCategory_name;
        $insert = new SubCategory;
        $insert->category_id = $category_id;
        $insert->subCategory_name = $subCategory_name;
        $insert->save();
        if($insert){
            return redirect('/subCategory/addSub')->with('message', 'inserted');
        }else{
            return redirect('/subCategory/addSub')->with('message', 'fail');

        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        $query_categories = Category::all();
        $sub_categories = DB::table('sub_categories')
        ->join('categories','sub_categories.category_id','=','categories.id')
        ->select('sub_categories.*','categories.category_name')
        ->get();
        return view('admin.subCategory.addSub',compact('query_categories','sub_categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subCategory = SubCategory::find($id);
        $query_categories = Category::all();
        return view('admin.subCategory.editSub',compact('subCategory','query_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $subCategory = SubCategory::find($id);
        $subCategory->subCategory_name = $request->get('subCategory_name');
        $subCategory->category_id = $request->get('category_id');
         $subCategory->save();
        return redirect('subCategory/addSub')->with('message','Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $subCategory = subCategory::find($id);
        $subCategory->delete();
        return redirect('subCategory/addSub')->with('message','delete');
    }
}
