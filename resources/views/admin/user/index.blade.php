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
                    @elseif(session()->get('message')=='edit')
                    <div class="alert alert-success">
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
           
            <h3>Show Users</h3>
            <div class="row">
                <!-- column -->
                <div class="col-12   m-auto">
                
                    <div class="table-responsive">
                        <table id="datatable" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class="border-top-0 text-center">S.L.</th>
                                    <th class="border-top-0 text-center">users Name</th>
                                    <th class="border-top-0 text-center">Email</th>
                                    <th class="border-top-0 text-center">Created Date</th>
                                    <th class="border-top-0 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($user as $key=>$data)
                                <tr>
                                
                                    <td style='line-height: 0.5;padding: .5rem;text-align: center'>{{$key+1}}</td>
                                    <td style='line-height: 0.5;padding: .5rem;text-align: center'>{{$data->name}}</td>
                                    <td style='line-height: 0.5;padding: .5rem;text-align: center'>{{$data->email}}</td>
                                     <td style='line-height: 0.5;padding: .5rem;text-align: center'>{{$data->created_at}}</td>
                                    <td>
                                       
                                        <a  href ="{{route('user.delete',$data->id)}}"  style="font-size:20px;padding: 5px;" ><i class="fa fa-trash"></i></a>
                                       
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



