@extends('webmaster')

@section('title','Home | i-Insure')

@section('home','active')

@section('body')
<section>
     <!---->
        <div class="content">
             <div class="container">
                 <div class="slider">
                        <ul class="rslides" id="slider1">
                          <li><img src="{{ URL::asset('web/images/banner2.jpg') }}" alt="">
                                <div class="carousel-caption d-none d-md-block">
                                    <h3>...</h3>
                                    <p>...</p>
                                </div>
                            </li>
                          <li><img src="{{ URL::asset('web/images/banner1.jpg') }}" alt="">
                                <div class="carousel-caption d-none d-md-block">
                                    <h3>...</h3>
                                    <p>...</p>
                                </div>
                            </li>
                          <li><img src="{{ URL::asset('web/images/banner3.jpg') }}" alt="">
                                <div class="carousel-caption d-none d-md-block">
                                    <h3>...</h3>
                                    <p>...</p>
                                </div>
                            </li>
                        </ul>
                 </div>
             </div>
        </div>
        <!---->
        <div class="bottom_content">
             <div class="container">
                 <div class="sofas">
                     <div class="col-md-6 sofa-grid sofs">
                         <img src="{{ URL::asset('web/images/t1.jpg') }}" height="200" alt=""/>
                         <h3>COMMERCIAL VEHICLE</h3>
                         <h4><a href="products.html">VIEW PREMIUMS - CV</a></h4>
                     </div>
                     <div class="col-md-6 sofa-grid">
                         <img src="{{ URL::asset('web/images/t2.jpg') }}" height="200" alt=""/>
                         <h3>PRIVATE CAR</h3>
                         <h4><a href="products.html">VIEW PREMIUMS - PC</a></h4>
                     </div>
                     <div class="clearfix"></div>
                 </div>
             </div>
        </div>
        
        <!---->
        <div class="top-sellers">
             <div class="container">
                 <h3><br/>OUR TRUSTED PARTNERS</h3>
                 <div class="seller-grids">
                     <div class="col-md-3 seller-grid">
                         <a href="products.html"><img src="{{ URL::asset('web/images/standard.jpg') }}" alt=""/></a>
                         <h4><a href="products.html">Standard Insurance</a></h4>
                     </div>
                     <div class="col-md-3 seller-grid">
                         <a href="products.html"><img src="{{ URL::asset('web/images/peoples-general.jpg') }}" alt=""/></a>
                         <h4><a href="products.html">People's General Insurance Corporation</a></h4>
                     </div>
                     <div class="col-md-3 seller-grid">
                         <a href="products.html"><img src="{{ URL::asset('web/images/fpg.png') }}" alt=""/></a>
                         <h4><a href="products.html">FPG Insurance</a></h4>
                     </div>
                     <div class="col-md-3 seller-grid">
                         <a href="products.html"><img src="{{ URL::asset('web/images/commonwealth.jpg') }}" alt=""/></a>
                         <h4><a href="products.html">Commonwealth Insruance Company </a></h4>
                     </div>
                     <div class="clearfix"></div>
                 </div>
             </div>
        </div>
        <!---->

        <!---->
        <div class="recommendation">
             <div class="container">
                 <div class="recmnd-head">
                     <h3>RECOMMENDATIONS FOR YOU</h3>
                 </div>
                 <div class="bikes-grids">           
                     <ul id="flexiselDemo1">
                         <li>
                             <a href="products.html"><img src="{{ URL::asset('web/images/car1.jpg') }}" alt=""/></a> 
                             <h4><a href="products.html">Model 1</a></h4> 
                             <p>Possible Premium: Php 90, 000.00</p>
                         </li>
                         <li>
                             <a href="products.html"><img src="{{ URL::asset('web/images/car1.jpg') }}" alt=""/></a>  
                             <h4><a href="products.html">Model 2</a></h4>    
                             <p>Possible Premium: Php 90, 000.00</p>
                         </li>
                         <li>
                             <a href="products.html"><img src="{{ URL::asset('web/images/car1.jpg') }}" alt=""/></a>
                             <h4><a href="products.html">Model 3</a></h4>  
                             <p>Possible Premium: Php 90, 000.00</p>
                         </li>
                         <li>
                             <a href="products.html"><img src="{{ URL::asset('web/images/car1.jpg') }}" alt=""/></a>
                             <h4><a href="products.html">Model 4</a></h4> 
                             <p>Possible Premium: Php 90, 000.00</p>
                         </li>
                         <li>
                             <a href="products.html"><img src="{{ URL::asset('web/images/car1.jpg') }}" alt=""/></a>  
                             <h4><a href="products.html">Model 5</a></h4> 
                             <p>Possible Premium: Php 90, 000.00</p>                   
                         </li>
                    </ul>
                    <script type="text/javascript">
                     $(window).load(function() {            
                      $("#flexiselDemo1").flexisel({
                        visibleItems: 5,
                        animationSpeed: 1000,
                        autoPlay: true,
                        autoPlaySpeed: 3000,            
                        pauseOnHover:true,
                        enableResponsiveBreakpoints: true,
                        responsiveBreakpoints: { 
                            portrait: { 
                                changePoint:480,
                                visibleItems: 1
                            }, 
                            landscape: { 
                                changePoint:640,
                                visibleItems: 2
                            },
                            tablet: { 
                                changePoint:768,
                                visibleItems: 3
                            }
                        }
                    });
                    });
                    </script>
                    <script type="text/javascript" src="{{ URL::asset('web/js/jquery.flexisel.js') }}"></script>             
             </div>
             </div>
        </div>
        <!---->
</section>
@endsection
