
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Emmo</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{env('CLIENT_APP_URL')}}/css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{env('CLIENT_APP_URL')}}/css/feather.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{env('CLIENT_APP_URL')}}/css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{env('CLIENT_APP_URL')}}/css/app-light.css" id="lightTheme" disabled>
    <link rel="stylesheet" href="{{env('CLIENT_APP_URL')}}/css/app-dark.css" id="darkTheme">
  </head>
  <body class="dark vertical">
      @guest
    <div class="wrapper vh-100">
      <div class="row align-items-center h-100">
        <div class="col-lg-6 d-none d-lg-flex">
        </div> <!-- ./col -->
        <div class="col-lg-6">
          <div class="w-50 mx-auto">
            <livewire:login-register />
        </div> <!-- .card -->
    </div> <!-- ./col -->
      </div> <!-- .row -->
    </div>
    @endguest
    @auth
    <div class="wrapper">
        <nav class="topnav navbar navbar-light">
          <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
            <i class="fe fe-menu navbar-toggler-icon"></i>
          </button>
          <form class="form-inline mr-auto searchform text-muted">
            <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search" placeholder="Type something..." aria-label="Search">
          </form>

        </nav>
        <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
          <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
            <i class="fe fe-x"><span class="sr-only"></span></i>
          </a>
          <nav class="vertnav navbar navbar-light">
            <!-- nav bar -->
            <div class="w-100 mb-4 d-flex">
              <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="/">
                <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
                  <g>
                    <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                    <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                    <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                  </g>
                </svg>
              </a>
            </div>
            <ul class="navbar-nav flex-fill w-100 mb-2">
              <li class="nav-item">
                <a href="/"class="nav-link">
                  <i class="fe fe-home fe-16"></i>
                  <span class="ml-3 item-text">Dashboard</span><span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="/metabase"class="nav-link">
                  <i class="fe fe-home fe-16"></i>
                  <span class="ml-3 item-text">Metabase</span><span class="sr-only">(current)</span>
                </a>
              </li>
            </ul>

          </nav>
        </aside>
        <main role="main" class="main-content">
          <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    @yield('main-section')
                </div>
            </div> <!-- .row -->
          </div> <!-- .container-fluid -->

        </main> <!-- main -->
      </div> <!-- .wrapper -->
    @endauth
    <script src="{{env('CLIENT_APP_URL')}}/js/jquery.min.js"></script>
    <script src="{{env('CLIENT_APP_URL')}}/js/popper.min.js"></script>
    <script src="{{env('CLIENT_APP_URL')}}/js/moment.min.js"></script>
    <script src="{{env('CLIENT_APP_URL')}}/js/bootstrap.min.js"></script>
    <script src="{{env('CLIENT_APP_URL')}}/js/simplebar.min.js"></script>
    <script src='{{env('CLIENT_APP_URL')}}/js/daterangepicker.js'></script>
    <script src='{{env('CLIENT_APP_URL')}}/js/jquery.stickOnScroll.js'></script>
    <script src="{{env('CLIENT_APP_URL')}}/js/tinycolor-min.js"></script>
    <script src="{{env('CLIENT_APP_URL')}}/js/config.js"></script>
    <script src="{{env('CLIENT_APP_URL')}}/js/apps.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag()
      {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-56159088-1');
    </script>
  </body>
</html>
</body>
</html>
