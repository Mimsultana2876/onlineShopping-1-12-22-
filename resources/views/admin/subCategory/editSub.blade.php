@extends('admin.layout.layout')
@section('content')
<div class="right_col" role="main">   
   <div class="col-12  w-75 m-auto">
            @if(session()->has('message'))
                @if(session()->get('message')=='Update')
                    <div class="alert alert-success">
                        <p>Successfully subCategory Update</p>

                    </div>
                    @elseif(session()->get('message')=='fail')
                    <div class="alert alert-danger">
                        <p>Successfully Not inserted</p>

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
                    <form  method="post" action="{{url('subCategory/updateSub',$subCategory->id)}}" class="form-horizontal form-material mx-2">
                        @csrf
                    
                        
                        <div class="form-group d-flex">
                            <label class="col-sm-12" style="width: 25%;">Edit Sub Category</label>
                            <div class="col-sm-12" style="width: 75%;">
                                <input name='subCategory_name' value="{{$subCategory->subCategory_name}}" type="text" placeholder="Insert Sub Category" class="form-control form-control-line" >
                            </div>
                        </div>
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Select Category <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select   name="category_id"  class="form-control col-md-7 col-xs-12">
                              <option value="">No category</option>
                              @foreach($query_categories as $data)
                              <option value="{{$data->id}}"{{$data->id == $subCategory->category_id ? 'selected': ''}}
                                >{{$data->category_name}}</option>
                              @endforeach
                          </select>
                        </div>
                      </div>

                        
                        
                        <div class="form-group d-flex">
                            <div class="col-sm-12" style="width: 25%;"></div>
                            <div class="col-sm-12" style="width: 75%;">
                                <button  type="submit" class="btn btn-success text-white">Edit</button>
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