<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <title>Yousuf Commission Shop</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- Choices CSS-->
    {{ asset('/fronted/')}}
    <link rel="stylesheet" href="{{ asset('/fronted/vendor/choices.js/public/assets/styles/choices.min.css')}}">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="{{ asset('/fronted/vendor/overlayscrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('/fronted/css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('/fronted/css/custom.css')}}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('/fronted/img/favicon.ico')}}">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
        <script defer src="{{ mix('js/app.js') }}"></script>
    </head>

  <body>
    <!-- Side Navbar -->

    @include('body.sidebar')
    @include('body.navheader')








    <div class="page">
        <header class="header">
            <nav class="navbar">
              <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between w-100">
                  <div class="d-flex align-items-center"><a class="menu-btn d-flex align-items-center justify-content-center p-2 bg-gray-900" id="toggle-btn" href="#">
                      <svg class="svg-icon svg-icon-sm svg-icon-heavy text-white">
                        <use xlink:href="#menu-1"> </use>
                      </svg></a><a class="navbar-brand ms-2" href="/home">
                      <div class="brand-text d-none d-md-inline-block text-uppercase letter-spacing-0"><span class="text-white fw-normal text-xs">Yousaf Commission </span><strong class="text-primary text-sm"> Shop</strong></div></a></div>
                  <ul class="nav-menu mb-0 list-unstyled d-flex flex-md-row align-items-md-center">
                    <!-- Notifications dropdown
                    <li class="nav-item dropdown"> <a class="nav-link text-white position-relative" id="notifications" rel="nofollow" data-bs-target="#" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                          <use xlink:href="#chart-1"> </use>
                        </svg><span class="badge bg-warning">12</span></a>
                      <ul class="dropdown-menu dropdown-menu-end mt-sm-3 shadow-sm" aria-labelledby="notifications">
                        <li><a class="dropdown-item py-3" href="#!">
                            <div class="d-flex">
                              <div class="icon icon-sm bg-blue">
                                <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                                  <use xlink:href="#envelope-1"> </use>
                                </svg>
                              </div>
                              <div class="ms-3"><span class="h6 d-block fw-normal mb-1 text-xs text-gray-600">You have 6 new messages </span><small class="small text-gray-600">4 minutes ago</small></div>
                            </div></a></li>
                        <li><a class="dropdown-item py-3" href="#!">
                            <div class="d-flex">
                              <div class="icon icon-sm bg-green">
                                <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                                  <use xlink:href="#chats-1"> </use>
                                </svg>
                              </div>
                              <div class="ms-3"><span class="h6 d-block fw-normal mb-1 text-xs text-gray-600">New 2 WhatsApp messages</span><small class="small text-gray-600">4 minutes ago</small></div>
                            </div></a></li>
                        <li><a class="dropdown-item py-3" href="#!">
                            <div class="d-flex">
                              <div class="icon icon-sm bg-orange">
                                <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                                  <use xlink:href="#checked-window-1"> </use>
                                </svg>
                              </div>
                              <div class="ms-3"><span class="h6 d-block fw-normal mb-1 text-xs text-gray-600">Server Rebooted</span><small class="small text-gray-600">8 minutes ago</small></div>
                            </div></a></li>
                        <li><a class="dropdown-item py-3" href="#!">
                            <div class="d-flex">
                              <div class="icon icon-sm bg-green">
                                <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                                  <use xlink:href="#chats-1"> </use>
                                </svg>
                              </div>
                              <div class="ms-3"><span class="h6 d-block fw-normal mb-1 text-xs text-gray-600">New 2 WhatsApp messages</span><small class="small text-gray-600">10 minutes ago</small></div>
                            </div></a></li>
                        <li><a class="dropdown-item all-notifications text-center" href="#!"> <strong class="text-xs text-gray-600">view all notifications                                            </strong></a></li>
                      </ul>
                    </li>

-->

                    <!-- Messages dropdown
                    <li class="nav-item dropdown"> <a class="nav-link text-white position-relative" id="messages" rel="nofollow" data-bs-target="#" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                          <use xlink:href="#envelope-1"> </use>
                        </svg><span class="badge bg-info">10</span></a>
                      <ul class="dropdown-menu dropdown-menu-end mt-sm-3 shadow-sm" aria-labelledby="messages">
                        <li><a class="dropdown-item d-flex py-3" href="#!"> <img class="img-fluid rounded-circle flex-shrink-0 avatar shadow-0" src="{{ asset('/fronted/img/avatar-1.jpg')}}" alt="..." width="45">
                            <div class="ms-3"><span class="h6 d-block fw-normal mb-1 text-sm text-gray-600">Jason Doe</span><small class="small text-gray-600"> Sent You Message</small>
                              <p class="mb-0 small text-gray-600">3 days ago at 7:58 pm - 10.06.2014</p>
                            </div></a></li>
                        <li><a class="dropdown-item d-flex py-3" href="#!"> <img class="img-fluid rounded-circle flex-shrink-0 avatar shadow-0" src="{{ asset('/fronted/img/avatar-2.jpg')}}" alt="..." width="45">
                            <div class="ms-3"><span class="h6 d-block fw-normal mb-1 text-sm text-gray-600">Jason Doe</span><small class="small text-gray-600"> Sent You Message</small>
                              <p class="mb-0 small text-gray-600">3 days ago at 7:58 pm - 10.06.2014</p>
                            </div></a></li>
                        <li><a class="dropdown-item d-flex py-3" href="#!"> <img class="img-fluid rounded-circle flex-shrink-0 avatar shadow-0" src="{{ asset('/fronted/img/avatar-3.jpg')}}" alt="..." width="45">
                            <div class="ms-3"><span class="h6 d-block fw-normal mb-1 text-sm text-gray-600">Jason Doe</span><small class="small text-gray-600"> Sent You Message</small>
                              <p class="mb-0 small text-gray-600">3 days ago at 7:58 pm - 10.06.2014</p>
                            </div></a></li>
                        <li><a class="dropdown-item text-center" href="#!"> <strong class="text-xs text-gray-600">Read all messages       </strong></a></li>
                      </ul>
                    </li>
-->

                    <!-- Languages dropdown
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle text-white text-sm" id="languages" rel="nofollow" data-bs-target="#" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="img/flags/16/GB.png" alt="English"><span class="d-none d-sm-inline-block ms-2">English</span></a>
                      <ul class="dropdown-menu dropdown-menu-end mt-sm-3 shadow-sm" aria-labelledby="languages">
                        <li><a class="dropdown-item" rel="nofollow" href="#!"> <img class="me-2" src="img/flags/16/DE.png" alt="English"><span>German</span></a></li>
                        <li><a class="dropdown-item" rel="nofollow" href="#!"> <img class="me-2" src="img/flags/16/FR.png" alt="English"><span>French                                                         </span></a></li>
                      </ul>
                    </li>
                     Log out-->
                    <li class="nav-item">
                        <a  href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                         {{ __('Logout') }}
                     </a>


                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                     </form>


                        <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                          <use xlink:href="#security-1"> </use>
                        </svg></a></li>
                  </ul>
                </div>
              </div>
            </nav>
          </header>

        @yield('dashboard')

    </div>
    <!-- JavaScript files-->
    <script src="{{ asset('/fronted/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('/fronted/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{ asset('/fronted/vendor/just-validate/js/just-validate.min.js')}}"></script>
    <script src="{{ asset('/fronted/vendor/choices.js/public/assets/scripts/choices.min.js')}}"></script>
    <script src="{{ asset('/fronted/vendor/overlayscrollbars/js/OverlayScrollbars.min.js')}}"></script>
    <script src="{{ asset('/fronted/js/charts-home.js')}}"></script>
    <!-- Main File-->
    <script src="{{ asset('/fronted/js/front.js')}}"></script>
    <script>
      // ------------------------------------------------------- //
      //   Inject SVG Sprite -
      //   see more here
      //   https://css-tricks.com/ajaxing-svg-sprite/
      // ------------------------------------------------------ //
      function injectSvgSprite(path) {

          var ajax = new XMLHttpRequest();
          ajax.open("GET", path, true);
          ajax.send();
          ajax.onload = function(e) {
          var div = document.createElement("div");
          div.className = 'd-none';
          div.innerHTML = ajax.responseText;
          document.body.insertBefore(div, document.body.childNodes[0]);
          }
      }
      // this is set to BootstrapTemple website as you cannot
      // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
      // while using file:// protocol
      // pls don't forget to change to your domain :)
      injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');


    </script>
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </body>
</html>
