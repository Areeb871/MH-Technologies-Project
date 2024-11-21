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

  <!-- =======================================================
  * Template Name: Reveal
  * Template URL: https://bootstrapmade.com/reveal-bootstrap-corporate-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-VX2PNQFV4D"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-VX2PNQFV4D');
  </script>
  <!-- ChatOnce embed START -->
    <script id="co-index" src="https://cdn.oncehub.com/co/widget.js" data-co-params="website_id=WEB-53790E773E&bot_id=BOT-ADD8D1FBDC&widget_on_load=true" defer></script>
    <!-- ChatOnce embed END -->
<body>
  <main>
  <header id="header" class="header sticky-top">
    <div class="branding d-flex align-items-cente">
      <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="#" class="logo d-flex align-items-center">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <!-- <img src="assets/img/logo.png" alt=""> -->
          <h1 class="sitename"><img src="assets/img/mhlogo1.png" alt="">
          </h1>
        </a>
        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="#hero" class="active">Home</a></li>
            <li><a href="{{url('/team/show')}}">Enchanters</a></li>
            <li><a href="{{ url('/portfolio?type=Development') }}">Development Portfolio</a></li>
            <li><a href="{{ url('/portfolio/design?type=Design')}}">Design Portfolio</a></li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
      </div>
    </div>
  </header>
  <main class="main">
 <!-- Hero Section 
 <section id="hero" class="hero section light-background">

<div class="info d-flex align-items-center">
  <div class="container">
    <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
      <div class="col-lg-8 text-center">
        <h2>Making <span>your ideas</span> happen!</h2>
        <p style="color: #0C2E8A;">An Award winning Mobile application & Website development team.</p>
        <a href="#featured-services" class="btn-get-started">Get Started</a>
      </div>
    </div>
  </div>
</div>

<div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

  <div class="carousel-item active">
    <img src="assets/img/hero-carousel/hero-carousel-1.jpg" alt="">
  </div>

  <div class="carousel-item">
    <img src="assets/img/hero-carousel/hero-carousel-2.jpg" alt="">
  </div>

  <div class="carousel-item">
    <img src="assets/img/hero-carousel/hero-carousel-3.jpg" alt="">
  </div>

  <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
    <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
  </a>

  <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
    <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
  </a>

</div>

</section> 
-->
<div class="banner-container">
    <div class="position-relative">
        <div class="video-container">
            @foreach($videos as $video)
                <video autoplay muted loop class="d-block w-100 img-fluid">
                    <source src="{{ asset('uploads/videos/'.$video->video) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            @endforeach
            <!-- Centered Text -->
            <div class="centered-text">
                <h1>An Award-winning Mobile Application & Website Development Team.</h1>
            </div>
        </div>
    </div>
</div>
 <!-- About Section -->
<section id="about" class="about section">
  <!-- Who We Are Section -->
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-4">
      <div class="col-lg-6 order-2 order-lg-1">
        <img src="assets/img/aboutus.webp" class="img-fluid" style="max-width: 100%; height: auto;">
      </div>
      <div class="col-lg-6 content order-1 order-lg-2">
        <h3>Who We Are?</h3>
        <p>With over 16 years of experience and a proven track record, MH Technologies is committed to delivering the very best. We provide exceptional Design and Development services across the globe.</p>
      </div>
    </div>
  </div>

  <!-- What We Do Section -->
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-4 mt-5">
      <div class="col-lg-6 content order-1 order-lg-1">
        <h3>What We Do</h3>
        <p>At MH Technologies, we turn digital dreams into a reality. We work closely with clients from idea to execution to ensure alignment with the end goal. Our services include design, development, meticulous bug checks, and delivering top-notch products. Partner with us for a long-term business relationship and exceptional Web & Mobile development services.</p>
      </div>
      <div class="col-lg-6 order-2 order-lg-2">
        <img src="assets/img/image1.webp" class="img-fluid" style="max-width: 100%; height: auto;">
      </div>
    </div>
  </div>

  <!-- Quality Guaranteed Section -->
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-4 mt-5">
      <div class="col-lg-6 order-2 order-lg-1">
        <img src="assets/img/image2.webp" class="img-fluid" style="max-width: 100%; height: auto;">
      </div>
      <div class="col-lg-6 content order-1 order-lg-2">
        <h3>Quality Guaranteed</h3>
        <p>The world of technology is fast-paced and challenging. Our goal is to deliver high-quality services tailored to your needs, regardless of budget or complexity. We pride ourselves on providing professional design and development services, ensuring an in-house experience for every client.</p>
      </div>
    </div>
  </div>
</section>

    <!-- Services Section -->
    <section id="services" class="services section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Services</h2>
        <p>We are committed to providing reliable, efficient, and innovative services tailored to your business.</p>
      </div><!-- End Section Title -->
      <div class="container">
<div class="row gy-4">
@foreach($services as $service)
  <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
    <div class="service-item d-flex position-relative h-100 ">
    @if($service->image != '')
   <img src="{{ asset('uploads/products/'.$service->image) }}" alt="Service Image">
    @endif
      <div>
        <h4 class="title"><a class="stretched-link">{{ $service->title }}</a></h4>
        <p class="description">{{ $service->description }}</p>
      </div>
    </div>
  </div><!-- End Service Item -->
  @endforeach
</div>
</div>
</div>
</section><!-- /Services Section -->


    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Testimonials</h2>
        <p>We pride ourselves on delivering exceptional service, and our clients agree!</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <div class="swiper-wrapper">
          @foreach($tests as $test)
          <div class="swiper-slide">
  <div class="testimonial-item">
    <img src="{{ asset('uploads/products/'.$test->image) }}" alt="Service Image" height="70px" width="60px">
    <h3>{{ $test->name }}</h3>
    <h4>{{ $test->profession }}</h4>
    <div class="stars">
      <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
    </div>
    <p class="testimonial-text">
      <span class="short-text">{{ Str::limit($test->review, 120) }}</span>
      <span class="long-text" style="display:none;">{{ $test->review }}</span>
      <a href="javascript:void(0);" class="see-more">See More</a>
    </p>
  </div>
</div>
@endforeach
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section><!-- /Testimonials Section -->

    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section dark-background">

  <div class="container">

    <div class="row" data-aos="zoom-in" data-aos-delay="100">
      <div class="col-xl-9 text-center text-xl-start">
        <h3>Talk to the experts</h3>
        <p>Get personalized guidance and expert advice for your projects. Whether you're looking for solutions, recommendations, or insights, our team is ready to help. Don't hesitate—reach out now and take the next step towards success!</p>
      </div>
      <div class="col-xl-3 cta-btn-container text-center">
        <a class="cta-btn align-middle" id="talk-to-expert-button">Talk to the experts</a>
      </div>
    </div>

  </div>

</section><!-- /Call To Action Section -->
<!-- /Team Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">
  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Contact</h2>
    <p>We would love to hear from you! If you have any questions, inquiries, or would like to discuss how we can assist you.</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row">
      <!-- Google Maps -->
      <div class="col-lg-12 mb-4" data-aos="fade-up" data-aos-delay="200">
        <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3007.2243556953335!2d-81.5178889!3d41.085944399999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNDHCsDA1JzA5LjQiTiA4McKwMzEnMDQuNCJX!5e0!3m2!1sen!2s!4v1728669406832!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div><!-- End Google Maps -->

      <!-- Contact Info and Form -->
      <div class="row gy-4">
        <!-- Contact Information -->
        <div class="col-lg-4">
          <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
            <i class="bi bi-geo-alt flex-shrink-0"></i>
            <div>
              <h3 >Address</h3>
              <ul>
                <li ><b>USA Office:</b> West Market Street, West Chester, Pennsylvania 19382, United States</li>
                <li><b>Malaysia Office:</b> No 6, Lorong Suasa, Klang 41300 Selangor</li>
                <li><b>Pakistan Office:</b> #645, Block L, Johar Town, Lahore</li>
              </ul>
            </div>
          </div><!-- End Info Item -->

          <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
            <i class="bi bi-telephone flex-shrink-0"></i>
            <div>
              <h3>Call Us</h3>
              <ul>
                <li><b>U.S.A:</b> +1 215-989-4348</li>
                <li><b>Malaysia:</b> +60 16-628-6716</li>
                <li><b>Pakistan:</b> +92 423-891-4847</li>
              </ul>
            </div>
          </div><!-- End Info Item -->

          <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
            <i class="bi bi-envelope flex-shrink-0"></i>
            <div>
              <h3>Email Us</h3>
              <ul>
                <li>info@mhtechnologies.us</li>
              </ul>
            </div>
        </div>
        </div><!-- End Contact Info -->

        <!-- Contact Form -->
        <div class="col-lg-8">
          <form  enctype="multipart/form-data" action="{{ route('form.store') }}" method="post" data-aos="fade-up" data-aos-delay="200">
            @csrf
            <div class="row gy-4">
              <div class=" col-lg-6">
                <input type="text" id="form" name="first_name" class="form-control" placeholder="Your Name" required="">
              </div>

              <div class=" col-lg-6">
                <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
              </div>

              <div class="col-md-12 ">
                <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
              </div>

              <div class="col-md-12">
                <textarea class="form-control" name="message" rows="12" placeholder="Message" required=""></textarea>
              </div>

              <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Send Message</button>
              </div>
            </div>
          </form>
        </div><!-- End Contact Form -->
      </div><!-- End Row -->

    </div><!-- End Container -->
  </section><!-- /Contact Section -->

     <!-- About Section -->
<section id="careers" class="careers-section" style="background-color: #f8f9fa; padding: 40px 0;">
  <div class="container section-title" data-aos="fade-up">
    <h2>Careers</h2>
  </div>
  
  <div class="container smaller-container" data-aos="fade-up" data-aos-delay="100">
    <div class="row d-flex align-items-center justify-content-center gy-4" style="min-height: 40vh;">
      <div class="col-lg-6 content text-center">
        <h3 style="font-size: 30px; font-weight: bold;">Join The Team</h3>
        <p style="font-size: 18px; color: #555;">
          We are always looking for talented individuals who can help us grow and succeed. Send us your Resume at 
          <strong>hr@mhtechnologies.us</strong>
        </p>
        <a href="mailto:hr@mhtechnologies.us" class="apply-btn btn mt-4">Apply Now</a>
      </div>
    </div>
  </div>
</section>
  </main>
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
                <span>Copyright © 2024</span> <strong class="px-1 sitename">MH TECHNOLOGIES</strong> <span>- All Rights Reserved</span>
            </div>
            <div class="credits">
                <!--Designed by <a href="">MH Technologies</a>-->
            </div>
        </div>
    </div>
</footer>
@include('chat')
  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"></a>
  <div id="preloader">
  <img src="{{asset('assets/img/mhlogos.PNG')}}" alt="Logo" class="preloader-logo">
</div>
  <!-- Vendor JS Files -->
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
<script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
</body>
</html>
<script>
document.addEventListener('DOMContentLoaded', function() {
  // Initialize the swiper after the DOM content is loaded
  const swiper = new Swiper('.init-swiper', {
    loop: true,
    speed: 600,
    slidesPerView: 'auto',
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 40
      },
      1200: {
        slidesPerView: 3,
        spaceBetween: 10
      }
    }
  });

  // Manually control autoplay behavior (without using swiper.autoplay)
  let autoplayInterval;

  function startAutoplay() {
    autoplayInterval = setInterval(function() {
      swiper.slideNext();  // Move to next slide
    }, 3000);  // Change every 5 seconds
  }

  function stopAutoplay() {
    clearInterval(autoplayInterval);
  }

  // Start autoplay when the page loads
  startAutoplay();

  // Select all "See More" links
  const seeMoreLinks = document.querySelectorAll('.see-more');

  seeMoreLinks.forEach(function(link) {
    link.addEventListener('click', function(event) {
      event.preventDefault(); // Prevent the default anchor behavior

      const testimonialItem = this.closest('.testimonial-item');
      const shortText = testimonialItem.querySelector('.short-text');
      const longText = testimonialItem.querySelector('.long-text');

      // Toggle visibility of short and long text
      if (longText.style.display === 'none' || longText.style.display === '') {
        longText.style.display = 'inline';  // Show long text
        shortText.style.display = 'none';   // Hide short text
        this.textContent = 'See Less';      // Change link text

        // Stop the autoplay when expanding the testimonial
        stopAutoplay();
      } else {
        longText.style.display = 'none';    // Hide long text
        shortText.style.display = 'inline'; // Show short text
        this.textContent = 'See More';      // Change link text

        // Resume autoplay when collapsing the testimonial
        startAutoplay();
      }
    });
  });
});

</script>
<script>
document.querySelector("#talk-to-expert-button").addEventListener("click", function(e) {
    e.preventDefault();
    const field = document.querySelector("#form"); // Update this ID to the specific field ID
    const offset = field.getBoundingClientRect().top + window.scrollY - 100; // Adjust 100px for header height
    window.scrollTo({ top: offset, behavior: "smooth" });
    field.focus(); // Set focus to the field for immediate typing
});
</script>



 





