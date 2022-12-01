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
                    <form method="post" action="{{route('subCategory.store')}}"  id="demo-form2"  class="form-horizontal form-label-left">
                        @csrf

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Sub Category Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="subCategory_name"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Select Category <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select   name="category_id"  class="form-control col-md-7 col-xs-12">
                              <option value="">No category</option>
                              @foreach($query_categories as $data)
                              <option value="{{$data->id}}">{{$data->category_name}}</option>
                              @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                         
                        
                          <input type="submit" value="submit" class="btn btn-success">
            
                        </div>
                      </div>

                    </form>
                </div>
            </div>
            
            <br>
            <h3>Show Sub Category</h3>
            <div class="row">
                <!-- column -->
                <div class="col-12   m-auto">
                
                    <div class="table-responsive">
                        <table id="datatable" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class="border-top-0 text-center">S.L.</th>
                                    <th class="border-top-0 text-center">Category Name</th>
                                    <th class="border-top-0 text-center">SubCategory Name </th>
                                    <th class="border-top-0 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($sub_categories as $key=>$data)
                                <tr>
                                
                                    <td style='line-height: 0.5;padding: .5rem;text-align: center'>{{$key+1}}</td>
                                    <td style='line-height: 0.5;padding: .5rem;text-align: center'>{{$data->category_name}}</td>
                                    <td style='line-height: 0.5;padding: .5rem;text-align: center'>{{$data->subCategory_name}}</td>
                                    <td>
                                        <a href="{{route('subCategory.editSub',$data->id)}}"  style="font-size:20px;padding: 5px;" ><i class="fa fa-edit"></i></a>
                                        <a  href ="{{route('subCategory.deleteSub',$data->id)}}"  style="font-size:20px;padding: 5px;" ><i class="fa fa-trash"></i></a>
                                       
                                    </td>

                                
                                </tr>
                            @endforeach
                    
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            
        </div>
          
    </div>
          
         
</div>



@endsection



