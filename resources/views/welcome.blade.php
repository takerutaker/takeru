<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>cafetière</title>
        <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'cafetière') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .btn-primary {
            color: #212529;
            background-color: #f2bf63;
            border-color: #f2bf63;
            }

            .btn-primary:hover {
            color: #212529;
            background-color: #efb140;
            border-color: #eeac34;
            }

            .btn-primary:focus,
            .btn-primary.focus {
            color: #212529;
            background-color: #efb140;
            border-color: #eeac34;
            box-shadow: 0 0 0 0.2rem rgba(211, 168, 90, 0.5);
            }

            .btn-primary.disabled,
            .btn-primary:disabled {
            color: #212529;
            background-color: #f2bf63;
            border-color: #f2bf63;
            }

            .btn-primary:not(:disabled):not(.disabled):active,
            .btn-primary:not(:disabled):not(.disabled).active,
            .show > .btn-primary.dropdown-toggle {
            color: #212529;
            background-color: #eeac34;
            border-color: #eda728;
            }

            .btn-primary:not(:disabled):not(.disabled):active:focus,
            .btn-primary:not(:disabled):not(.disabled).active:focus,
            .show > .btn-primary.dropdown-toggle:focus {
            box-shadow: 0 0 0 0.2rem rgba(211, 168, 90, 0.5);
            }
          
.btn {
  display: inline-block;
  font-weight: 400;
  color: #212529;
  text-align: center;
  vertical-align: middle;
  cursor: pointer;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
  background-color: transparent;
  border: 1px solid transparent;
  padding: 0.375rem 0.75rem;
  font-size: 0.9rem;
  line-height: 1.6;
  border-radius: 0.25rem;
  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

@media (prefers-reduced-motion: reduce) {
  .btn {
    transition: none;
  }
}

.btn:hover {
  color: #212529;
  text-decoration: none;
}

.btn:focus,
.btn.focus {
  outline: 0;
  box-shadow: 0 0 0 0.2rem rgba(242, 191, 99, 0.25);
}

.btn.disabled,
.btn:disabled {
  opacity: 0.65;
}
a.btn.disabled,
fieldset:disabled a.btn {
  pointer-events: none;
}

@supports ((position: -webkit-sticky) or (position: sticky)) {
  .sticky-top {
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    z-index: 1020;
  }

}

.position-sticky {
  position: -webkit-sticky !important;
  position: sticky !important;
}
        </style>
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-lg navbar-dark bg-info">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
    
                    
                <a class="navbar-brand" href="{{ url('/') }}">
                    
                        <h1 style="position: relative; color: white; margin: -4% 0px 0px -5%;">&nbsp;&nbsp;&nbsp;cafetière</h1>
                </a> 
    
                <div style="margin: 0px 0px 0px 2%;" class="collapse navbar-collapse" id="navbarColor01">
                    <ul class="navbar-nav mr-auto">
                        
                        
                      <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}"><h5>Home</h5><span class="sr-only">(current)</span></a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link" href="{{ url('/home') }}"><h5>Restaurant Listing</h5></a>
                      </li>

                      
                    </ul>
                    
                  </div>
                        
                   
              
                <div class="collapse navbar-collapse" id="navbarColor01">
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
    
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                  
                  
                </div>
              </nav>
            <main class="py-4">
                @yield('content')
            </main>
        </div>
        
        
            

            

            <div class="content">
                <img style="position: relative; left: -0.5em; max-width: 50%;"src="img/cus.png">

                <div class="title m-b-md">
                    <i>~ cafetière ~</i>
                </div>
                <h2>
                    A Restaurant Listing Website
                </h2>
                <br>
                <br>

                <div class="links">
                    
                    

                    <a href="{{ url('/home') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Submit Listing Here</a>

                </div>
                  <!-- Footer -->

<footer class="page-footer font-small blue">

    <!-- Copyright -->
    <div style="margin: 15% 0px 0px 0px;"class="footer-copyright text-center py-3">© 2020 Copyright:
      <a style="color: black;" href="{{ url('/') }}"> cafetière.com</a>
    </div>
    <!-- Copyright -->
  
  </footer>
  <!-- Footer -->
            </div>
        
    </body>
    
</html>
