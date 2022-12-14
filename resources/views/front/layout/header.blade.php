<div class="container-fluid">
     
        <div class="row align-items-center bg-druck py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="" class="text-decoration-none">
                    <span  class="h1 text-uppercase text-primary  px-2 style='color:green' "><i class='fas fa-perfume'></i>PERFUMANCE</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-6 text-right">
                <a href="{{route('userLogin')}}" class="btn px-0">
                <i class="fa-solid fa-user "style='color:green; width: 50px;font: size 30px;line-height:50px; text-align:center; height:50px'></i>
                </a>
                <a href="{{route('cart')}}" class="btn px-0 ml-3">
                <i class="fa-solid fa-cart-shopping "style='color:green; width: 50px;font: size 30px;line-height:50px; text-align:center; height:50px'></i>
                 </a>
            </div>
           
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="navbar navbar-expand-sm bg-success navbar-light">
        <div class="row px-xl-5">
            
            <div class="col-lg-5">
                <nav class="navbar navbar-expand-sm bg-success navbar-light ">
                   
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0 ">
                            @php  
                            $categories = App\Models\category::get();
                            $subCategories = App\Models\SubCategory::get();
                            @endphp
                           @foreach($categories as $cat)
                            <li class="category_item ">
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" >{{$cat->category_name}}<i class="fa fa-angle-down mt-1"></i></a>
                                    
                                            
                                    <div class="dropdown-menu bg-primary rounded-0 border-0 m-0 ">
                                
                                        <ul class="sub_cate">
                                        @foreach($subcategories as $sub)
                                        @if($sub->category_id == $cat->id ) 
                                        <li class="category_item">
                                            <a href="#" class="dropdown-item" >{{$sub->subCategory_name}} </a>
                                        </li>
                                        @endif
                                        @endforeach
                                
                                        </ul>  
                                    </div>
                                   
                                </div>
                            </li>
                            
                           @endforeach
                           

                       
                        </div>
                       
                        
                       
                    </div>
                    


                </nav>
            </div>
        </div>
    </div>