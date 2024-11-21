<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>MH Technologies</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">


  <!-- Main CSS File -->
  <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">

  <style>
      #custCarousel .carousel-indicators {
          position: static;
          margin-top: 20px;
      }
      #custCarousel .carousel-indicators > li {
          width: 100px;
      }
      #custCarousel .carousel-indicators li img {
          display: block;
          width: 100%; 
          height: auto; 
          max-width: 80px; 
      }

      .carousel-item img {
          width: 100%;
          height: 550px;
      }
      h2 {
          text-align: left; 
          margin-bottom: 20px; 
      }
      .col-md-11 {
          max-width: 95%; /* Adjust max width as needed */
          padding: 6px; /* Add padding */
          background-color: #ffffff; /* White background for contrast */
          border-radius: 8px; /* Rounded corners */
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
          margin-left: 50px; /* This will push it to the right */
      }
      @media (max-width: 769px) {
          .carousel-item img {
              height: 300px; /* Adjust height for small screens */
              width: 100%; /* Full width for images */
          }
          .col-md-11 {
              max-width: 100%; /* Ensure full width on small screens */
              margin-left: 0; /* Remove left margin on small screens */
          }
          h2 {
              font-size: 20px; /* Smaller font size for small screens */
          }
          #custCarousel .carousel-indicators {
              display: none; /* Hide thumbnails in mobile view */
          }
      }
  </style>
</head>
<body>
<header id="header" class="header sticky-top">
  <div class="branding d-flex align-items-cente">
    <div class="container position-relative d-flex align-items-center justify-content-between">
      <a href="#" class="logo d-flex align-items-center">
      <h1 class="sitename">
      <img src="{{ asset('assets/img/mhlogo1.png') }}" alt="">
      </h1>
      </a>
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{route('service.show')}}">Home</a></li>
          <li><a href="{{url('/team/show')}}">Enchanters</a></li>
          <li><a href="{{ url('/portfolio?type=Development') }}">Development Portfolio</a></li>
          <li><a href="{{ url('/portfolio/design?type=Design') }}"class="active">Design Portfolio</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </div>
</header>
<section id="portfolio" class="portfolio section">
  <div class="container">
    <div class="row">
      <div class="col-md-11">
        <div id="custCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000"> <!-- Set interval to 2000 ms -->
          
          <h4 class="category-title">Design & Creativity</h4>
          <!-- Slides -->
          <div class="carousel-inner">
            @php $active = true; @endphp
            @foreach($test as $index => $portfolio)
              <div class="carousel-item {{ $active ? 'active' : '' }}">
                <img src="{{ asset('uploads/products/'.$portfolio->image) }}" alt="{{ $portfolio->image }}" class="img-fluid portfolio-image">
              </div>
              @php $active = false; @endphp
            @endforeach
          </div>
        
          <!-- Left and right controls -->
          <a class="carousel-control-prev" href="#custCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </a>
          <a class="carousel-control-next" href="#custCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </a>

          <!-- Thumbnails -->
          <ol class="carousel-indicators list-inline">
            @php $activeThumb = true; @endphp
            @foreach($test as $index => $portfolio)
              <li class="list-inline-item {{ $activeThumb ? 'active' : '' }}">
                <a id="carousel-selector-{{ $index }}" data-bs-slide-to="{{ $index }}" data-bs-target="#custCarousel">
                  <img src="{{ asset('uploads/products/'.$portfolio->image) }}" alt="Thumbnail" class="img-thumbnail" style="width:50px;height:50px">
                </a>
              </li>
              @php $activeThumb = false; @endphp
            @endforeach
          </ol>

        </div>
      </div>
    </div>
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
              <!--  Designed by <a href="">MH Technologies</a>-->
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
<script src="{{asset('assets/js/main.js')}}"></script>

<script>
  const carouselElement = document.querySelector('#custCarousel');
  const carouselInstance = new bootstrap.Carousel(carouselElement);

  carouselElement.addEventListener('mouseenter', () => {
      carouselInstance.pause();
  });

  carouselElement.addEventListener('mouseleave', () => {
      carouselInstance.cycle();
  });
</script>
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
</body>
</html>
