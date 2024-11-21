<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>MH Technologies</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{asset('assets/img/mhlogos.PNG')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">

</head>
<body class="index-page">
<header id="header" class="header sticky-top">
  <div class="branding d-flex align-items-center">
    <div class="container position-relative d-flex align-items-center justify-content-between">
      <a href="#" class="logo d-flex align-items-center">
      <h1 class="sitename">
  <img src="assets/img/mhlogo1.png" alt="">
</h1>
      </a>
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{route('service.show')}}">Home</a></li>
          <li><a href="{{ url('/team/show') }}">Enchanters</a></li>
          <li><a href="{{ url('/portfolio?type=Development') }}"class="active">Development Portfolio</a></li>
          <li><a href="{{ url('/portfolio/design?type=Design') }}">Design Portfolio</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </div>
</header>
<section id="portfolio" class="portfolio section">
    <div class="container">
        @foreach($test as $category => $portfolios) <!-- Looping through categories -->
        <h4 class="category-title">{{ $category }}</h4>
        <div class="row portfolio-row"> <!-- Added a class for better spacing -->
            @foreach($portfolios as $portfolio) <!-- Looping through portfolio items under each category -->
            <div class="col-lg-4 col-md-6 portfolio-item mb-4"> <!-- Keeping 3 items in a row on large screens -->
                <img src="{{ asset('uploads/products/'.$portfolio->image) }}" alt="Service Image" class="img-fluid portfolio-image">
                <div class="portfolio-info">
                    <h4>{{ $portfolio->title }}</h4>
                    <p>{{ $portfolio->description }}</p>
                    <a href="{{ $portfolio->link }}" title="More Details" class="details-link" target="_blank">
                        <i class="bi bi-link-45deg"></i>
                    </a>
                </div>
            </div><!-- End Portfolio Item -->
            @endforeach
        </div>
        @endforeach
    </div>
</section>

<footer id="footer" class="footer dark-background">
    <div class="container">
        <div class="social-links d-flex justify-content-center">
          <!--
            <a href="{{ $link->xlink }}" target="_blank">
                <i class="bi bi-twitter-x"></i> <!-- Twitter icon -
            </a>
        
            <a href="{{ $link->ilink }}" target="_blank">
                <i class="bi bi-instagram"></i> <!-- Instagram icon 
            </a>
        -->
            <a href="{{ $link->flink }}" target="_blank">
                <i class="bi bi-facebook"></i> <!-- Facebook icon -->
            </a>
            <a href="{{ $link->linkd }}" target="_blank">
                <i class="bi bi-linkedin"></i> <!-- LinkedIn icon -->
            </a>
            <!--
            <a href="{{ $link->sklink }}" target="_blank">
                <i class="bi bi-skype"></i> <!--  icon 
            </a>
        -->
        </div>
        <div class="container mt-4">
            <div class="copyright">
                <span>Copyright © 2024</span> <strong class="px-1 sitename">MH Technologies</strong> <span>- All Rights Reserved</span>
            </div>
            <div class="credits">
                <!--Designed by <a href="">MH Technologies</a>-->
            </div>
        </div>
    </div>
</footer>
@include('chat')
<div id="preloader">
  <img src="{{asset('assets/img/mhlogos.PNG')}}" alt="Logo" class="preloader-logo">
</div>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
<script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
</html>
<script>
  window.onscroll = function() {
    var header = document.getElementById('header');
    if (window.scrollY > 60) {
      header.classList.add('scrolled');
    } else {
      header.classList.remove('scrolled');
    }
  };
</script>


