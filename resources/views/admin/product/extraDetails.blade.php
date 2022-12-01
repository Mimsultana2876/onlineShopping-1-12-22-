
@extends('admin.layout.layout')
@section('content')
<div class="right_col" role="main">   
   <div class="col-12  w-75 m-auto">
            @if(session()->has('message'))
                @if(session()->get('message')=='inserted')
                    <div class="alert alert-success">
                        <p>Successfully inserted</p>

                    </div>
                    @elseif(session()->get('message')=='fail')
                    <div class="alert alert-danger">
                        <p>Successfully Not inserted</p>

                    </div>
                    @elseif(session()->get('message')=='Update')
                    <div class="alert alert-success">
                        <p>Successfully Updated</p>

                    </div>
                    @elseif(session()->get('message')=='delete')
                    <div class="alert alert-success">
                        <p>Successfully Deleted</p>

                    </div>
                @endif
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
            @endif
            <div class="card main_category"> 
                <div class="card-body">
                    <!-- <h2 class="card-title text-center" style="text-transform: uppercase;">Add Police Station</h2>-->
                    <form method="post" action="{{route('product.extraDetailsStore',$id)}}"  id="demo-form2"  class="form-horizontal form-label-left" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Title<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="first-name" required="required" name="title" value="{{@$product->ProductDetail->title}}" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Total Items <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" id="first-name" required="required" name="total_items" value="{{@$product->ProductDetail->total_items}}" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Description <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <textarea class="form-control col-md-7 col-xs-12" require="" name="description"   rows="5"> {{@$product->ProductDetail->description}}</textarea>
                        </div>
                    </div>
                       
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                         <input type="submit" value="submit" class="btn btn-success">
            
                        </div>
                    </div>
                      

                    </form>
                </div>
            </div>
            
            <br>
           
            
            
        </div>
          
    </div>
          
         
</div>

@endsection