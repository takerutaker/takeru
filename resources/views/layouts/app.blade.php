<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'cafetière') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
        
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-info">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

                
            <a class="navbar-brand" href="{{ url('/') }}">
                <img style="position: relative; left: 1em; max-width: 20%;"src="img/cus.png">
                    <h1 style="position: relative; color: white; margin: -10% 0px 0px 20%;">&nbsp;&nbsp;&nbsp;cafetière</h1>
            </a> 

            <div style="margin: 0px 0px 0px -10%;" class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mr-auto">
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}"><h3>Home</h3></a>
                      </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/home') }}"><h3>Restaurant Listing</h3> <span class="sr-only">(current)</span></a>
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
     <!-- Footer -->

<footer class="page-footer font-small blue">



    <!-- Copyright -->
    <div style="margin: 15% 0px 0px 0px;"class="footer-copyright text-center py-3">© 2020 Copyright:
      <a style="color: black;" href="{{ url('/') }}"> cafetière.com</a>
    </div>
    <!-- Copyright -->
  
  </footer>
  <!-- Footer -->

  

</body>

</html>
