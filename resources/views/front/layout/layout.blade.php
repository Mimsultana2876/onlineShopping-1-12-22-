<!DOCTYPE html>
<html lang="en">
@include('front.layout.head')
<body>
    <!-- Topbar Start -->
   @include('front.layout.header')
    <!-- Navbar End -->
    @if(session()->has('message'))
        @if(session()->get('message')=='inserte')
            <div class="alert alert-success">
                <p>Successfully Login</p>

            </div>
            
        @endif
    @endif

    <!-- Carousel Start -->
    <div class="container-fluid mb-3">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#header-carousel" data-slide-to="1"></li>
                        <li data-target="#header-carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item position-relative active" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="front_theme/img/perfume3.jpg" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown"> PERFUMANCE</h1>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="front_theme/img/ator3.jpg" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">PERFUMANCE </h1>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="front_theme/img/ator3.jpg" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">PERFUMANCE </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid" src="front_theme/img/perfume3.jpg" alt="">
                   
                </div>
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid" src="front_theme/img/perfume3.jpg" alt="">
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"style="text-align: center;"><span class="bg-secondary pr-3">নতুন যা এসেছে</span></h2>
        <div class="row px-xl-5">
        @foreach($new_products as $data)
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
            
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                    <img class="img-fluid w-100" src="{{'uploads/'.$data->p_image}}" alt="">
                       
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">{{$data->p_name}}</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>{{$data->p_price}}</h5><h6 class="text-muted ml-2"></h6>
                   
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <a   class="btn btn-info" href="{{route('detailView',$data->id)}}" >হ্যা ,এটাই নিবো </a>
                        </div>
                       
                    </div>
                </div>
            
            </div>
        @endforeach
        </div>
    </div>
    <!-- Products End -->

    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4" style="text-align: center;"><span class="bg-secondary pr-3">সবচেয়ে সেরা</span></h2>
        <div class="row px-xl-5">
             @foreach($products->chunk(2) as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                 @foreach($product as $value)
                <div class=" product-item bg-light mb-4 ">
                    
                   
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="{{'uploads/'.$value->p_image}}" alt="">
                       
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">{{$value->p_name}}</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>{{$value->p_price}}</h5><h6 class="text-muted ml-2"></h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <a   class="btn btn-info" href="{{route('detailView',$value->id)}}" >হ্যা ,এটাই নিবো </a>
                        </div>
                    </div>
                 
                  
                </div>
                @endforeach
            </div>
            @endforeach
        
        </div>
    </div>
    <!-- Products End -->


    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="bg-light p-4">
                        <img src="img/ator4.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/ator5.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/ator6.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/ator4.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/ator5.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/ator6.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/ator4.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/ator5.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->


    <!-- Footer Start -->
    @include('front.layout.footer')
    <!-- Footer End -->


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

    <!--font icon-->
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>


   
</body>

</html>