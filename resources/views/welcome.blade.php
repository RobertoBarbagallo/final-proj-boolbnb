<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <style>
        html,
        body {
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
        .links>a {
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
    </style>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/user/structures/') }}">Area privata</a>
            @if(Auth::user()->user_img_path)
            <img class="avatar" src="{{ asset('storage/' . Auth::user()->user_img_path) }}" alt="Card image cap">
            @endif
            @else
            <a class="" href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                Laravel
            </div>

            <form method="post" action="{{ route('home.search')}}" id="postform" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="search">Search</label>
                    <input type="text" class="form-control" name="search" id="search" aria-describedby="searchHelp" placeholder="Inserisci la città">
                    <small id="searchHelp" class="form-text text-muted">Dove vuoi andare? </small>
                </div>
                <input class="btn btn-primary" id='submit' type="submit" value="Invia"><br>
            </form>    
        </div>
    </div>
</body>
</html>
