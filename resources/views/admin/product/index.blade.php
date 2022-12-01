@extends('admin.layout.layout')
@section('content')
<div class="right_col" role="main">   
   <div class="col-12  w-75 m-auto">
          @if(session()->has('message'))
                @if(session()->get('message')=='add')
                    <div class="alert alert-success">
                        <p>Successfully Add Extra Details</p>

                    </div>
                    @elseif(session()->get('message')=='delete')
                    <div class="alert alert-danger">
                        <p>Successfully Delete</p>

                    </div>
                @endif
            @endif
       <h3>Show Product </h3>
            <div class="row">
                <!-- column -->
                <div class="col-12   m-auto">
                
                    <div class="table-responsive">
                        <table id="datatable" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class="border-top-0 text-center">S.L.</th>
                                    <th class="border-top-0 text-center">Category Name</th>
                                    <th class="border-top-0 text-center">Product Name </th>
                                    <th class="border-top-0 text-center">Product Price </th>
                                    <th class="border-top-0 text-center">Extra Details </th>
                                    <th class="border-top-0 text-center">Product Image </th>
                                    <th class="border-top-0 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $key=>$product)
                                <tr>
                                
                                    <td style='line-height: 0.5;padding: .5rem;text-align: center'>{{$key+1}}</td>
                                    <td style='line-height: 0.5;padding: .5rem;text-align: center'>{{$product->p_name}}</td>
                                    <td style='line-height: 0.5;padding: .5rem;text-align: center'>
                                    @if($product->category_id)
                                    {{$product->category->category_name}}
                                    @endif 
                                     </td>
                                    <td style='line-height: 0.5;padding: .5rem;text-align: center'>{{$product->p_price}}</td>
                                    <td><button class="btn btn-info"><a href="{{route('product.extraDetails',$product->id)}}">Click me!</a></button></td>
                                    <td > <img style="height:88px; width: 88px;" src="
                                    {{asset('uploads/'.$product->p_image)}}" ></td>
                                    <td>
                                        <a href="{{route('product.editPro',$product->id)}}"  style="font-size:20px;padding: 5px;" ><i class="fa fa-edit"></i></a>
                                        <a  href ="{{route('product.deletePro',$product->id)}}"  style="font-size:20px;padding: 5px;" ><i class="fa fa-trash"></i></a>
                                       
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

@endsection