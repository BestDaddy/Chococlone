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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
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
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                Laravel
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
{{--                <li><a href="{{ url('/home') }}">Home</a></li>--}}
{{--                    <form action="{{ url('/search') }}" method="get" class="form-inline my-2 my-lg-0">--}}

{{--                        <input type="text"  class="form-control" placeholder="Company title, keywords...">--}}
{{--                        <button type="submit" class="btn btn-primary btn-block text-white btn-search">Search Job</button>--}}
{{--                    </form>--}}




            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">


                <li>
                    <form action="{{ url('/search') }}" method="get" class="form-inline my-2 my-lg-0">
                        <input class="form-control form-control-lg" type="text" name="name" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </li>
                <!-- Authentication Links -->

                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Cart 0</a></li>
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li><a href="{{ url('/user') }}">Cart {{count(Auth::user()->orders)}}</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/home') }}"><i class="fa fa-btn    "></i>Profile</a></li>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>


<nav class="navbar navbar-default navbar-static">
    <div class="container">

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                @foreach($categories as $category)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ $category->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            @foreach($subcategories as $subcategory)
                                @if($subcategory->category->id == $category->id)
                                    <li><a href="{{ url('/subcategory/' .$subcategory->id) }}">{{$subcategory->name}}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
{{--<script src="{{asset('js/bootstrap.bundle.js')}}"></script>--}}
{{--<script src="{{asset('js/bootstrap.js')}}"></script>--}}
<script src="{{asset('js/jquery.js')}}"></script>


@yield('scripts')
</body>
</html>
