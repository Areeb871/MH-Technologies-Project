<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MH Technologies</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/img/mhlogos.PNG')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">


  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="#" class="logo d-flex align-items-center">
        <img src="assets/img/mhlogo1.png" alt="">
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
    @php
$unreadNotificationsCount = App\Models\Notification::where('read_status', 0)->count();
$notifications = App\Models\Notification::where('read_status', 0)
    ->orderBy('created_at', 'desc')
    ->take(5)
    ->get();
@endphp

<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">
    <!-- Search Icon (for mobile view) -->
    <li class="nav-item d-block d-lg-none">
      <a class="nav-link nav-icon search-bar-toggle" href="#">
        <i class="bi bi-search"></i>
      </a>
    </li><!-- End Search Icon -->

    <!-- Notification Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-bell"></i>
        <!-- Dynamic Notification Counter -->
        <span class="badge bg-primary badge-number" id="notification-count">{{ $unreadNotificationsCount }}</span>
      </a><!-- End Notification Icon -->

      <!-- Notification List -->
      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications" style="min-width: 300px;">
        <li class="dropdown-header d-flex justify-content-between align-items-center">
          <span>Notifications</span>
          <a href="{{ route('notifications.all') }}" class="text-primary"><small></small></a>
        </li>
        <li><hr class="dropdown-divider"></li>

        <!-- Loop through Notifications -->
        @forelse ($notifications as $notification)
          <li class="notification-item" data-id="{{ $notification->id }}" onclick="markAsRead('{{ $notification->id }}')">
            <i class="bi bi-info-circle text-primary"></i>
            <div>
              <h5 class="notification-title">{{ $notification->title }}</h5>
              <p class="notification-message">{{ $notification->message }}</p>
              <p class="notification-time text-muted">{{ $notification->created_at->diffForHumans() }}</p>
            </div>
          </li>
          <li><hr class="dropdown-divider"></li>
        @empty
          <li class="text-center p-2">No new notifications</li>
        @endforelse

      </ul><!-- End Notification Dropdown Items -->
    </li><!-- End Notification Dropdown -->
  </ul>
</nav>

        <li class="nav-item dropdown pe-3">

        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   {{ Auth::user()->name }}
                                </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
           
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->
      </ul>
     
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
    <a class="nav-link" href="{{ route('banners.list') }}">
        <i class="bi bi-journal-text"></i><span>Manage banner</span>
    </a>
</li>
      <li class="nav-item">
    <a class="nav-link" href="{{ route('service.list') }}">
        <i class="bi bi-bar-chart"></i><span>Manage Services</span>
    </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="">
          <i class="bi bi-menu-button-wide"></i><span>Manage Portfolio</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('portfolio.list', ['type' => 'Design']) }}">
              <i class="bi bi-circle"></i><span>Manage Design</span>
            </a>
          </li>
          <li>
            <a href="{{ route('portfolio.list', ['type' => 'Development']) }}">
              <i class="bi bi-circle"></i><span>Manage Development</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('testimonial.list') }}">
        <i class="bi bi-layout-text-window-reverse"></i><span>Manage testimonial</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('team.list') }}">
        <i class="bi bi-journal-text"></i><span>Manage team</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('form.list') }}">
        <i class="bi bi-journal-text"></i><span>Manage Contactus</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('link.list') }}">
        <i class="bi bi-journal-text"></i><span>Manage Social Links</span>
    </a>
</li>
  </aside><!-- End Sidebar-->
  <div id="main">
    @yield('content')
   </div>
  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/quill/quill.js')}}"></script>
  <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main1.js')}}"></script>

</body>

</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  function markAsRead(notificationId) {
    $.ajax({
      url: '/notifications/read/' + notificationId,
      type: 'POST',
      data: {
        _token: '{{ csrf_token() }}' // Pass CSRF token for security
      },
      success: function(response) {
        if (response.success) {
          // Decrease the notification count
          let currentCount = parseInt($('#notification-count').text());
          if (currentCount > 0) {
            $('#notification-count').text(currentCount - 1);
          }
          // Optionally, hide or mark the notification as read in the UI
          $('[data-id="' + notificationId + '"]').remove();
        }
        window.location.href = "/deatilproduct";
      },
      error: function(xhr, status, error) {
        console.error('Error:', error);
      }
    });
  }
</script>
