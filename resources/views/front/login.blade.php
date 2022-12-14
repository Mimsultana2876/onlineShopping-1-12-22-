<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>নীড়পাতা-PERFUMANCE</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <!-- Favicon -->
    <link href="{{asset('front_theme/img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('front_theme/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('front_theme/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('front_theme/css/style.css')}}" rel="stylesheet">
    <!--end -->
    
    <link href="css/all.min.css" rel="stylesheet">
  
</head>
<body>

     <!-- Navbar Start -->
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
                     <div class="navbar-nav mr-auto py-0 flex">
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
    <!-- Navbar End -->

    <!-- login-->
    <!-- Contact Start -->
    <div class="container-fluid">
        @if(session()->has('message'))
            @if(session()->get('message')=='inserted')
                <div class="alert alert-success">
                    <p>Successfully Login</p>

                </div>
                @elseif(session()->get('message')=='insertedReg')
                <div class="alert alert-success">
                    <p>Successfully  Registered</p>

                </div>
                @elseif(session()->get('message')=='inserte')
                <div class="alert alert-success">
                    <p>Successfully  login</p>

                </div>
                @elseif(session()->get('message')=='success')
                <div class="alert alert-success">
                    <p>Successfully Login</p>

                </div>
                @elseif(session()->get('message')=='fail')
                <div class="alert alert-danger">
                    <p>Invaild Email or Password!</p>

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
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"style="text-align: center;"><span class="bg-secondary pr-3">অ্যাকাউন্ট</span></h2>
        <div class="row px-xl-7">
            <div class="col-lg-5 mb-7">
              <h2>Register</h2>
                <div class="contact-form bg-light p-30">
                    <div id="success"></div>
                    <form name="sentMessage" id="contactForm" novalidate="novalidate" action="{{route('user_store')}}" method="post">
                        @csrf
                        <div class="control-group">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Please Enter Your User Name "
                                required="required" data-validation-required-message="Please enter your name" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                                <input type="email" class="form-control" name="email" id="name" placeholder="Please Enter Your  Email Adress"
                                    required="required" data-validation-required-message="Please enter your email" />
                                <p class="help-block text-danger"></p>
                            </div>
                        <div class="control-group">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter Your Password"
                                required="required" data-validation-required-message="Please enter your password" />
                            <p class="help-block text-danger"></p>
                        </div>
                       
                        
                        <div>
                            <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Send</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 mb-7">
              <h2>login</h2>
                <div class="contact-form bg-light p-30">
                        <div id="success"></div>
                        <form name="sentMessage" id="contactForm" novalidate="novalidate" action="{{route('loginCheck')}}" method="post">
                            @csrf
                            <div class="control-group">
                                <input type="text" class="form-control" name="name"  placeholder="Please Enter Your User Name "
                                    required="required" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="email" class="form-control" name="email"  placeholder="Please Enter Your  Email Adress"
                                    required="required"  />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="password" class="form-control" name="password"  placeholder="Please enter your password"
                                    required="required"  />
                                <p class="help-block text-danger"></p>
                            </div>
                           
                            <div>
                                <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
    <!-- Contact End -->

<!-- end login form-->
   


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">Get In Touch</h5>
                <p class="mb-4">No dolore ipsum accusam no lorem. Invidunt sed clita kasd clita et et dolor sed dolor. Rebum tempor no vero est magna amet no</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Quick Shop</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">My Account</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Newsletter</h5>
                        <p>Duo stet tempor ipsum sit amet magna ipsum tempor est</p>
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Your Email Address">
                                <div class="input-group-append">
                                    <button class="btn btn-primary">Sign Up</button>
                                </div>
                            </div>
                        </form>
                        <h6 class="text-secondary text-uppercase mt-4 mb-3">Follow Us</h6>
                        <div class="d-flex">
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-secondary">
                    &copy; <a class="text-primary" href="#">Domain</a>. All Rights Reserved. Designed
                    by
                    <a class="text-primary" href="https://htmlcodex.com">HTML Codex</a>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="front_theme/lib/owlcarousel/owl.carousel.min.js"></script>
   
    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="front_theme/js/main.js"></script>
    <script type="text/javascript" src="Scripts/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
</body>

</html>