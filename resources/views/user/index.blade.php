@extends('layouts.head')

@section('content')

    <div class="container">
        <div id="page">
            <div id="header">Personal data</div>

            <div id="content">
                <h4>{{ Auth::user()->name }}</h4>
            </div>
            <div id="action">
                <h3>Balance: {{ Auth::user()->balance }}</h3>
                <h4>Balance: {{ Auth::user()->bonus }}</h4>
            </div>
        </div>
        <br>
        <br>
        <div id="page">
            <div id="footer ">
            </div>
        </div>
@endsection


