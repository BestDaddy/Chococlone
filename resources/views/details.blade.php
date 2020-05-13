@extends('layouts.head')

@section('content')

    <div class="container">
        <div id="page">
            <div id="header">{{$company->name}}</div>

            <div id="content">

            </div>
            <div id="action">
                <h3>{{$company->certificats[0]->price}}</h3>
                <form action="">
                    <button>Купить</button>
                </form>
            </div>
        </div>
        <br>
        <br>
        <div id="page">
            <div id="footer ">
        </div>
    </div>
@endsection


