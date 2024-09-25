<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | MyRentalAgency</title>

    <!-- Favicon -->
    <link href="{{ asset('/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('/css/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/js/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/js/wow/wow.min.js') }}"></script>
    <script src="{{ asset('/js/easing/easing.min.js') }}"></script>
    <script src="{{ asset('/js/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('/js/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('/js/app.js') }}"></script>
<head>
</head>
<body>
  <div class="container-xxl bg-white p-0">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <div class="container-fluid nav-bar bg-transparent">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
            <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center text-center">
                <div class="icon p-2 me-2">
                    <img class="img-fluid" src="{{ asset('/img/icon-deal.png') }}" alt="Icon" style="width: 30px; height: 30px;">
                </div>
                <h1 class="m-0 text-primary">MyRentalAgency</h1>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            @php
              $route = request()->route()->getName();
            @endphp
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <a @class(['nav-item nav-link', 'active' => str_contains($route, 'home')]) 
                  href="{{ route('home') }}">Home</a>
                    <div class="nav-item dropdown">
                        <a href="#" @class(['nav-link dropdown-toggle', 'active' => str_contains($route, 'property.index')]) data-bs-toggle="dropdown">Property</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="{{ route('property.index') }}" class="dropdown-item" >Property List</a>
                        </div>
                    </div>                        
                    <a href="{{ route('about') }}" class="nav-item nav-link">About</a>                
                    <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>                
                @auth
                  <div class="nav-item dropdown">
                      <a href="#" @class(['nav-link dropdown-toggle', 'active' => str_contains($route, 'admin.')]) 
                      data-bs-toggle="dropdown">Manage</a>
                      <div class="dropdown-menu rounded-0 m-0">
                        <a @class(['dropdown-item', 'active' => str_contains($route, 'admin.property.')]) 
                          href="{{ route('admin.property.index') }}">Manage Listings</a>
                        <a @class(['dropdown-item', 'active' => str_contains($route, 'option.')]) 
                          href="{{ route('admin.option.index') }}">Manage Options</a>
                      </div>
                  </div>                  
                </div>
                <a @class(['btn btn-secondary px-3 d-none d-lg-flex', 'active' => str_contains($route, 'login')]) 
                  href="{{ route('logout') }}">Logout</a>
                @endauth 
                @guest
                </div>
                <a @class(['btn btn-primary px-3 d-none d-lg-flex', 'active' => str_contains($route, 'login')]) 
                  href="{{ route('login') }}">Login</a>
                @endguest
            </div>
        </nav>
    </div>
    <!-- Navbar End -->
      
    @yield('content')
      
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Get In Touch</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>6596 2e Av., Montréal, QC H1Y 2Z4</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+1 (438) 528-3971</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>fabien.dariel@gmail.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href="https://www.facebook.com/fabien.dariel.7"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href="https://github.com/fabiendariel"><i class="fab fa-github"></i></a>
                        <a class="btn btn-outline-light btn-social" href="https://www.linkedin.com/in/fabien-dariel-5915903b/"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Quick Links</h5>
                    <a class="btn btn-link text-white-50" href="{{ route('about') }}">About Us</a>
                    <a class="btn btn-link text-white-50" href="{{ route('contact') }}">Contact Us</a>
                    <a class="btn btn-link text-white-50" href="{{ route('testimonials') }}">Our Services</a>
                    <a class="btn btn-link text-white-50" href="#">Privacy Policy</a>
                    <a class="btn btn-link text-white-50" href="#">Terms & Condition</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Photo Gallery</h5>
                    <div class="row g-2 pt-2">
                        <div class="col-4">
                            <img class="img-fluid rounded bg-light p-1" src="{{ asset('/img/property-1.jpg') }}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid rounded bg-light p-1" src="{{ asset('/img/property-2.jpg') }}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid rounded bg-light p-1" src="{{ asset('/img/property-3.jpg') }}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid rounded bg-light p-1" src="{{ asset('/img/property-4.jpg') }}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid rounded bg-light p-1" src="{{ asset('/img/property-5.jpg') }}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid rounded bg-light p-1" src="{{ asset('/img/property-6.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Newsletter</h5>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="{{ route('home') }}">MyRentalAgency</a>, All Right Reserved. 
                    
          <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
          Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a><br/>
          
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="{{ route('home') }}">Home</a>
                            <a href="#">Cookies</a>
                            <a href="#">Help</a>
                            <a href="#">FQAs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    
  </div>
</body>
</html>