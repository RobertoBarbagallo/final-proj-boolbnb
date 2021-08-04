<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    

    {{-- Swipe slider --}}
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;700&display=swap" rel="stylesheet">

    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.5.0/maps/maps.css'>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white py-2">
            <div class="container">
                <div class="logo-container d-flex align-items-center">
                    <div class="logo-img-container">
                        <img class="logo" src="{{asset('storage/imgs/BoolBnB-logo.png')}}" alt="Logo">
                    </div>
                    <a class="navbar-brand logo-text ml-2" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                    </a>
                </div>
                <div class="" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <div class="dropdown mydropdown">
                            <button class="d-flex align-items-center mydropdownbutton px-2 py-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             Diventa un host
                            </button>
                                <div class="dropdown-menu py-0" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item myitem px-0" href="{{ route('login') }}">
                                        {{ __('Login') }}
                                    </a>
                                    @if (Route::has('register'))
                                        <a class="dropdown-item myitem px-0" href="{{ route('register') }}">
                                                {{ __('Register') }}
                                        </a>
                                    @endif    
                                </div>
                        </div>      
                        @else
                        <div class="dropdown mydropdown">
                            <button class="d-flex align-items-center mydropdownbutton px-2 py-1 mr-4" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fas fa-bars"></i>
                              <img class="avatar ml-2" src="{{ asset('storage/' . Auth::user()->user_img_path) }}" alt="Card image cap">
                            </button>
                                <div class="dropdown-menu private py-0" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item myitem px-0" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                     <a class="dropdown-item myitem px-0" href="{{ url('/user/structures/') }}">
                                       Area Privata
                                    </a>
                                </div>
                        </div>         
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
        <footer>
            <div class="container">
                <div class="row justify-content-around py-5">
                    <div class="col-md-3 col-sm-6 mb-2">
                        <h5>INFORMAZIONI</h5>
                        <p>Come funziona BoolBnB</p>
                        <p>NewsRoom</p>
                        <p>BoolBnB 2021</p>
                        <p>Investitori</p>
                        <p>BoolBnB Plus</p>
                        <p>BoolBnB Luxe</p>
                        <p>Hotel Tonight</p>
                        <p>BoolBnB for Work</p>
                        <p>Opportunità di lavoro</p>
                        <p>Lettera dei fonfatori</p> 
                    </div>
                    <div class="col-md-3 col-sm-6 mb-2">
                        <h5>COMMUNITY</h5>
                        <p>Diversità e appatenenza</p>
                        <p>Accessibilità</p>
                        <p>BoolBnB Associates</p>
                        <p>Allloggi d'emergenza</p>
                        <p>Invitare un ospite</p>
                        <p>BoolBnB.org</p>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-2">
                    <h5>OSPITA</h5>
                        <p>Diventa un host</p>
                        <p>Offri un'esperienza Online</p>
                        <p>Offri un'esperienza</p>
                        <p>Ospitare responsabilmente</p>
                        <p>Centro risorse</p>
                        <p>Community Center</p>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-2">
                    <h5>ASSISTENZA</h5>
                        <p>La risposta all'emergenza Covid-19</p>
                        <p>Centro Assistenza</p>
                        <p>Opzioni di cancellazione</p>
                        <p>Servizio di supporto al vicinato</p>
                        <p>Affidabilità e sicurezza</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.5.0/maps/maps-web.min.js"></script>
</body>
</html>
