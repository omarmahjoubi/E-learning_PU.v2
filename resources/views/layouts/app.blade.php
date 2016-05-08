<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>E-learning</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"
          integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{base_path()}} . '/public/pdf/' . $url">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css">
    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }

        .stylish-panel {
            padding: 20px 0;
            text-align: center;
        }

        .stylish-panel > div > div {
            padding: 10px;
            border: 1px solid transparent;
            border-radius: 4px;
            transition: 0.2s;
        }

        .stylish-panel > div:hover > div {
            margin-top: -10px;
            border: 1px solid rgb(200, 200, 200);
            box-shadow: rgba(0, 0, 0, 0.1) 0px 5px 5px 2px;
            background: rgba(200, 200, 200, 0.1);
            transition: 0.5s;
        }

        .stylish-panel > div:hover img {
            border-radius: 50%;
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            transform: rotate(360deg);
        }

    </style>
</head>
<body id="app-layout">
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <ul class="nav navbar-nav navbar-left">
                <li class="dropdown">
                    <a class="navbar-brand" href="{{ url('/') }}" class="dropdown-toggle" data-toggle="dropdown"
                       role="button" aria-expanded="false">
                        E-learning<span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        @if (Auth::user())
                            <li><a href="/user/info/{{ Auth::user()->id }}">Mon profil</a></li>
                            <li><a href="/user/editer/{{ Auth::user()->id }}">Editer mon Profil</a></li>
                            @if(Auth::user()->admin !=1)
                                <li><a href="/user/lister_themes_suivi/{{ Auth::user()->id }}">Mes Thémes</a></li>
                            @endif
                            @if(Auth::user()->admin==1)
                                <li><a href="/lister_users">Lister les utlisateurs</a></li>
                            @endif
                        @endif
                    </ul>
                </li>
            </ul>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/home') }}">Acceuil</a></li>
                @if (Auth::guest())
                @else
                    <li><a href="/theme/lister/{{ Auth::user()->id}}">Nos Thémes</a></li>
                @endif
                @if (Auth::user())
                    @if (Auth::user()->admin==1)
                        <li><a href="{{ url('/cours/ajouter') }}">ajouter cours</a></li>
                        <li><a href="{{ url('/theme/ajouter') }}">ajouter théme</a></li>
                    @endif
                @endif
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->pseudo}} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

@yield('content')

        <!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"
        integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
