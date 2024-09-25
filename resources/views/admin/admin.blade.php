<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Administration</title>

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
    
    <!-- Tom-Select Libraries -->
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
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
    <div class="container-fluid nav-bar bg-transparent sticky-top mt-0">
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
                    <a href="about.html" class="nav-item nav-link">About</a>                
                    <a href="contact.html" class="nav-item nav-link">Contact</a>                
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
  
    <div class="container mt-2 p-5">  
      @include('shared.flash')    
      @yield('content')
    </div>

  </div>
  
  <script>
    new TomSelect('select[multiple]', {plugins: {remove_button: {title: 'Supprimer'}}})
  </script>
</body>
</html>