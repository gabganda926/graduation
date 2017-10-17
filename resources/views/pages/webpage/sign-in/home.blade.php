@extends('pages.webpage.webmaster')

@section('title','Home | i-Insure')

@section('home','active')

@section('body')
<section>
     <!---->
        <div class="content">
             <div class="container">
                 <div class="slider">
                        <ul class="rslides" id="slider1">
                          <li><img src="{{ URL::asset('web/images/banner2.jpg') }}" style="height: 700px;" alt="">
                                <div class="carousel-caption d-none d-md-block">
                                    <h3>...</h3>
                                    <p>...</p>
                                </div>
                            </li>
                          <li><img src="{{ URL::asset('web/images/banner1.jpg') }}" style="height: 700px;" alt="">
                                <div class="carousel-caption d-none d-md-block">
                                    <h3>...</h3>
                                    <p>...</p>
                                </div>
                            </li>
                          <li><img src="{{ URL::asset('web/images/banner3.jpg') }}" style="height: 700px;" alt="">
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
        <div class="top-sellers" style="background-color: #424242; color: white">
             <div class="container">
                 <div class="seller-grids">
                     <div class="col-md-4 seller-grid">
                         <a href="/home"><img src="{{ URL::asset('web/images/standard.jpg') }}" style="height: 250px; width: 250px;" alt=""/></a>
                     </div>
                     <div class="col-md-8 seller-grid">
                        <br/><br/><br/>
                         <b>Accidents, vehicle theft and breakdowns can happen when you least expect it. How would you afford the costs of replacing or repairing your car, or pay for the damage to someone else's vehicle? A Car Insurance policy could assist with paying these costs. If you're looking for cheap Car Insurance, our comparison tool will help you find quotes at premiums that suit your needs and your budget.</b><br/><br/>
                          <a href="/user/quotation" style="color: white" type="button" class="btn btn-lg btn-success">Get a quote now!</a>
                     </div>
                     <div class="clearfix"></div>
                 </div>
                 <div class="seller-grids">
                     <div class="col-md-8 seller-grid">
                        <br/><br/><br/><br/>
                         <b>If you drive, chances are that you will eventually be in an accident or have another incident that damages your car. You will need to follow certain steps to file a claim with your car insurance company to get reimbursement.</b><br/><br/>
                          <a href="/user/claims" type="button" style="color: white" class="btn btn-lg btn-warning">File a claim</a>
                     </div>
                     <div class="col-md-4 seller-grid">
                         <a href="/home"><img src="{{ URL::asset('web/images/standard.jpg') }}" style="height: 250px; width: 250px;" alt=""/></a>
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
                         <a href="/home"><img src="{{ URL::asset('web/images/standard.jpg') }}" alt=""/></a>
                         <h4><a href="/home">Standard Insurance</a></h4>
                     </div>
                     <div class="col-md-3 seller-grid">
                         <a href="/home"><img src="{{ URL::asset('web/images/peoples-general.jpg') }}" alt=""/></a>
                         <h4><a href="/home">People's General Insurance Corporation</a></h4>
                     </div>
                     <div class="col-md-3 seller-grid">
                         <a href="/home"><img src="{{ URL::asset('web/images/fpg.png') }}" alt=""/></a>
                         <h4><a href="/home">FPG Insurance</a></h4>
                     </div>
                     <div class="col-md-3 seller-grid">
                         <a href="/home"><img src="{{ URL::asset('web/images/commonwealth.jpg') }}" alt=""/></a>
                         <h4><a href="/home">Commonwealth Insruance Company </a></h4>
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
