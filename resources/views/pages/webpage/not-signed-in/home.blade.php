<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Compreline Insurance Services</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::asset ('web/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{ URL::asset ('web/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="{{ URL::asset ('web/css/freelancer.min.css')}}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Compreline Insurance Services</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#portfolio">Partners</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
      <div style="top: 500px; left:1180px; background-color:none; width:150px;height:150px; padding:6px; position: fixed; border-radius:8px;">

       <a href="/quotation" data-toggle="tooltip" title="Send a quote now!">
         <img style="height: 100%; width: 100%;" src="{{ URL::asset ('images/icons/quotation1.png')}}" alt="">
        </a>
      </div>
    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <img class="img-fluid" style="height: 30%; width: 30%" src="{{ URL::asset('images/logo.png')}}" alt="">
        <div class="intro-text">
          <span class="name">COMPRELINE INSURANCE SERVICES</span>
          <hr class="star-light">
          <span class="skills">Motorcar Insurance</span>
        </div>
      </div>
    </header>

    <!-- Portfolio Grid Section -->
    <section id="portfolio">
      <div class="container">
        <h2 class="text-center">OUR TRUSTED PARTNERS</h2>
        <hr class="star-primary">
        <div class="row">
          <div class="col-sm-6 portfolio-item">
            <a class="portfolio-link" href="#portfolioModal1" data-toggle="modal">
              <div class="caption">
                <div class="caption-content">
                  <i class="fa fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="{{ URL::asset ('image/insurance-company-logos/commonwealth1.png')}}" alt="">
            </a>
          </div>
          <div class="col-sm-6 portfolio-item">
            <a class="portfolio-link" href="#portfolioModal2" data-toggle="modal">
              <div class="caption">
                <div class="caption-content">
                  <i class="fa fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="{{ URL::asset ('image/insurance-company-logos/fpg.png')}}" alt="">
            </a>
          </div>
          <div class="col-sm-6 portfolio-item">
            <a class="portfolio-link" href="#portfolioModal3" data-toggle="modal">
              <div class="caption">
                <div class="caption-content">
                  <i class="fa fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="{{ URL::asset ('image/insurance-company-logos/peoples-general.png')}}" alt="">
            </a>
          </div>
          <div class="col-sm-6 portfolio-item">
            <a class="portfolio-link" href="#portfolioModal4" data-toggle="modal">
              <div class="caption">
                <div class="caption-content">
                  <i class="fa fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="{{ URL::asset ('image/insurance-company-logos/standard.png')}}" alt="">
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- About Section -->
    <section class="success" id="about">
      <div class="container">
        <h2 class="text-center">About Compreline</h2>
        <hr class="star-light">
        <div class="row">
          <div class="col-lg-4 ml-auto">
            <p>Compreline Insurance Agency, is a non-life Insurance Agency established in 2015.</p>
          </div>
          <div class="col-lg-4 mr-auto">
            <p>Non-Life Insurance Broker that combines products provided by the most respected insurance providers into a custom package that meets the client’s personal or business needs. </p>
          </div>
          <div class="col-lg-8 mx-auto text-center">
            <a href="/sign-in" class="btn btn-lg btn-outline">
              <i class="fa fa-download"></i>
              Sign in
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
      <div class="container">
        <h2 class="text-center">Contact Us</h2>
        <hr class="star-primary">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
            <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
            <form name="sentMessage" id="contactForm" novalidate>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label>Name</label>
                  <input class="form-control" id="name" type="text" placeholder="Name" required data-validation-required-message="Please enter your name.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label>Email Address</label>
                  <input class="form-control" id="email" type="email" placeholder="Email Address" required data-validation-required-message="Please enter your email address.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label>Phone Number</label>
                  <input class="form-control" id="phone" type="tel" placeholder="Phone Number" required data-validation-required-message="Please enter your phone number.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label>Message</label>
                  <textarea class="form-control" id="message" rows="5" placeholder="Message" required data-validation-required-message="Please enter a message."></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <br>
              <div id="success"></div>
              <div class="form-group">
                <button type="submit" class="btn btn-success btn-lg" id="sendMessageButton">Send</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="text-center">
      <div class="footer-above">
        <div class="container">
          <div class="row">
            <div class="footer-col col-md-4">
              <h3>Location</h3>
              <p>1610, 3 Marikina-Infanta Highway,
                <br>Pasig, Metro Manila</p>

            </div>
            <div class="footer-col col-md-4">
              <h3>Around the Web</h3>
              <ul class="list-inline">
                <li class="list-inline-item">
                  <a class="btn-social btn-outline" href="#">
                    <i class="fa fa-fw fa-facebook"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a class="btn-social btn-outline" href="#">
                    <i class="fa fa-fw fa-google-plus"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a class="btn-social btn-outline" href="#">
                    <i class="fa fa-fw fa-twitter"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a class="btn-social btn-outline" href="#">
                    <i class="fa fa-fw fa-linkedin"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a class="btn-social btn-outline" href="#">
                    <i class="fa fa-fw fa-dribbble"></i>
                  </a>
                </li>
              </ul>
            </div>
            <div class="footer-col col-md-4">
              <h3>About Freelancer</h3>
              <p>Freelance is a free to use, open source Bootstrap theme created by
                <a href="http://startbootstrap.com">Start Bootstrap</a>.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-below">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              Copyright &copy; Your Website 2017
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top d-lg-none">
      <a class="btn btn-primary js-scroll-trigger" href="#page-top">
        <i class="fa fa-chevron-up"></i>
      </a>
    </div>

    <!-- Portfolio Modals -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <h2>Commonwealth Insurace Company</h2>
                  <hr class="star-primary">
                  <img class="img-fluid img-centered" src="img/portfolio/cabin.png" alt="">
                  <p>Commonwealth Insurance Company (CIC) was established in 1935 by Don Andres Soriano, who also founded San Miguel Brewery. Computed to be in its 7th decade, CIC is one of the most experienced insurers in the Philippines.</p>
                  <ul class="list-inline item-details">
                    <li>Website:
                      <strong>
                        <a href="http://cic.com.ph/">Commonwealth Insurance Company</a>
                      </strong>
                    </li>
<!--                     <li>Date:
                      <strong>
                        <a href="http://startbootstrap.com">April 2014</a>
                      </strong>
                    </li>
                    <li>Service:
                      <strong>
                        <a href="http://startbootstrap.com">Web Development</a>
                      </strong>
                    </li> -->
                  </ul>
                  <button class="btn btn-success" type="button" data-dismiss="modal">
                    <i class="fa fa-times"></i>
                    Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <h2>FPG Insurance Company</h2>
                  <hr class="star-primary">
                  <img class="img-fluid img-centered" src="img/portfolio/cake.png" alt="">
                  <p>Established in 1958 by the Zuellig Group of Companies, FPG Insurance, formerly known as Federal Phoenix Assurance Co., Inc. has built an enviable reputation for developing in-depth customer insights that support the creation of relevant and comprehensive commercial and individual insurance products and solutions.</p>
                  <ul class="list-inline item-details">
                    <li>Website:
                      <strong>
                        <a href="http://fpgins.com.ph/">FPG Insurace Company</a>
                      </strong>
                    </li>
<!--                     <li>Date:
                      <strong>
                        <a href="http://startbootstrap.com">April 2014</a>
                      </strong>
                    </li>
                    <li>Service:
                      <strong>
                        <a href="http://startbootstrap.com">Web Development</a>
                      </strong>
                    </li> -->
                  </ul>
                  <button class="btn btn-success" type="button" data-dismiss="modal">
                    <i class="fa fa-times"></i>
                    Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <h2>People's General Insurance</h2>
                  <hr class="star-primary">
                  <img class="img-fluid img-centered" src="img/portfolio/circus.png" alt="">
                  <p>Use this area of the page to describe your project. The icon above is part of a free icon set by
                    <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                  <ul class="list-inline item-details">
                    <li>Website:
                      <strong>
                        <a href="http://ww12.peoplesgen.com.ph/">People's General Insurance</a>
                      </strong>
                    </li>
<!--                     <li>Date:
                      <strong>
                        <a href="http://startbootstrap.com">April 2014</a>
                      </strong>
                    </li>
                    <li>Service:
                      <strong>
                        <a href="http://startbootstrap.com">Web Development</a>
                      </strong>
                    </li> -->
                  </ul>
                  <button class="btn btn-success" type="button" data-dismiss="modal">
                    <i class="fa fa-times"></i>
                    Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <h2>Standard Insurance</h2>
                  <hr class="star-primary">
                  <img class="img-fluid img-centered" src="img/portfolio/game.png" alt="">
                  <p>One of the leading non-life insurance companies in the country today providing more than 55 years of service to the insuring public.</p>
                  <ul class="list-inline item-details">
                    <li>Website:
                      <strong>
                        <a href="http://startbootstrap.com">Standard Insurance</a>
                      </strong>
                    </li>
<!--                     <li>Date:
                      <strong>
                        <a href="http://startbootstrap.com">April 2014</a>
                      </strong>
                    </li>
                    <li>Service:
                      <strong>
                        <a href="http://startbootstrap.com">Web Development</a>
                      </strong>
                    </li> -->
                  </ul>
                  <button class="btn btn-success" type="button" data-dismiss="modal">
                    <i class="fa fa-times"></i>
                    Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <h2>Project Title</h2>
                  <hr class="star-primary">
                  <img class="img-fluid img-centered" src="img/portfolio/safe.png" alt="">
                  <p>Use this area of the page to describe your project. The icon above is part of a free icon set by
                    <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                  <ul class="list-inline item-details">
                    <li>Client:
                      <strong>
                        <a href="http://startbootstrap.com">Start Bootstrap</a>
                      </strong>
                    </li>
                    <li>Date:
                      <strong>
                        <a href="http://startbootstrap.com">April 2014</a>
                      </strong>
                    </li>
                    <li>Service:
                      <strong>
                        <a href="http://startbootstrap.com">Web Development</a>
                      </strong>
                    </li>
                  </ul>
                  <button class="btn btn-success" type="button" data-dismiss="modal">
                    <i class="fa fa-times"></i>
                    Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <h2>Project Title</h2>
                  <hr class="star-primary">
                  <img class="img-fluid img-centered" src="img/portfolio/submarine.png" alt="">
                  <p>Use this area of the page to describe your project. The icon above is part of a free icon set by
                    <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                  <ul class="list-inline item-details">
                    <li>Client:
                      <strong>
                        <a href="http://startbootstrap.com">Start Bootstrap</a>
                      </strong>
                    </li>
                    <li>Date:
                      <strong>
                        <a href="http://startbootstrap.com">April 2014</a>
                      </strong>
                    </li>
                    <li>Service:
                      <strong>
                        <a href="http://startbootstrap.com">Web Development</a>
                      </strong>
                    </li>
                  </ul>
                  <button class="btn btn-success" type="button" data-dismiss="modal">
                    <i class="fa fa-times"></i>
                    Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
    });
    </script>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ URL::asset ('web/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ URL::asset ('web/vendor/popper/popper.min.js')}}"></script>
    <script src="{{ URL::asset ('web/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{ URL::asset ('web/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Contact Form JavaScript -->
    <script src="{{ URL::asset ('web/js/jqBootstrapValidation.js')}}"></script>
    <script src="{{ URL::asset ('web/js/contact_me.js')}}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{ URL::asset ('web/js/freelancer.min.js')}}"></script>

  </body>

</html>
