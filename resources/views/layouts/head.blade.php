<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Chococlone</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    {{--    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}" />--}}
    {{--    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-grid.css') }}" />--}}
    {{--    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-reboot.css') }}" />--}}
    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
        #grid {
            display: grid;
            grid-template-rows: 1fr 1fr 1fr;
            grid-template-columns: 1fr 1fr 1fr;
            grid-gap: 2vw;
        }
        #grid > div {
            font-size: 0.9vw;
            padding: .5em;
            background: lightgrey;
            text-align: center;
        }
        /*div {*/
        /*    text-align:center;*/
        /*}*/
        div#page {
            border:1px solid grey;
            width:955px;
            margin:0 auto;
            padding:5px;

            position:relative
        }
        div#header {
            border:2px solid grey;
            width:930px;
            height:30px;
            margin: auto;
            text-align:center;
        }
        div#content {

            border:2px solid grey;
            width:730px;
            margin:10px 7px;

            height:300px
        }

        div#action {
            position:absolute;
            top:50px;
            right:11px;
            border:2px solid grey;
            width:150px;
            margin:-5px 0px 175px;
            height:300px;
            text-align:center;
        }
        div#info {
            border:2px solid grey;
            width:930px;
            height:500px;
            margin: auto;
        }
        div#footer {
            border:2px solid grey;
            width:750px;
            height:30px;
        }

        #zatemnenie {
            background: rgba(102, 102, 102, 0.5);
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            display: none;
        }
        #okno {
            width: 600px;
            height: 500px;
            text-align: center;
            padding: 15px;
            border: 3px solid #0000cc;
            border-radius: 10px;
            color: #0000cc;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            margin: auto;
            background: #fff;
        }
        #zatemnenie:target {display: block;}
        .close {
            display: inline-block;
            border: 1px solid #0000cc;
            color: #0000cc;
            padding: 0 12px;
            margin: 10px;
            text-decoration: none;
            background: #f2f2f2;
            font-size: 14pt;
            cursor:pointer;
        }
        .close:hover {background: #e6e6ff;}

        #Div2 {
            display: none;
        }
    </style>

</head>
<body id="app-layout">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}">Laravel</a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <form action="{{ url('/search') }}" method="get" class="form-inline my-2 my-lg-0 mr-5">
                    <input class="form-control mr-sm-2" type="search" name="name" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                @if (Auth::guest())
                    <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Cart 0</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ url('/user') }}">Cart {{count(Auth::user()->orders)}}</a></li>

                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" role="menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ url('/home') }}">Profile</a>
                            <a class="dropdown-item" href="{{ url('/logout') }}">Logout</a>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-2 mb-2">
    <ul class="nav nav-tabs">
        @foreach($categories as $category)
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">{{ $category->name }}</a>
                <div class="dropdown-menu">
                    @foreach($subcategories as $subcategory)
                        @if($subcategory->category->id == $category->id)
                            <a class="dropdown-item" href="{{ url('/subcategory/' .$subcategory->id) }}">{{$subcategory->name}} <small>{{count($subcategory->companies)}}</small></a>
                        @endif
                    @endforeach
                </div>
            </li>
        @endforeach
    </ul>
</div>


@yield('content')

<!-- JavaScripts -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
{{--<script src="{{asset('js/bootstrap.bundle.js')}}"></script>--}}
{{--<script src="{{asset('js/bootstrap.js')}}"></script>--}}
<script src="{{asset('js/jquery.js')}}"></script>


@yield('scripts')
</body>
</html>
