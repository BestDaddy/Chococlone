@extends('layouts.head')

@section('content')

    <div class="container">

        <div id="page">
            <div id="zatemnenie">
                <div id="okno">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Discount</th>
                            <th scope="col">Bought</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($company->certificats)
                            @foreach($company->certificats as $certificate)
                                <tr>
                                    <td>{{$certificate->name}}</td>
                                    <td>{{$certificate->price}}</td>
                                    <td>{{$certificate->discount}}%</td>
                                    <td>{{$certificate->bought}}</td>
                                    <td>
                                        @if(Auth::user())
                                            {!! Form::open(['method'=>'POST', 'action'=>'UserOrdersController@store']) !!}
                                            {!! Form::hidden ('certificate_id', $certificate->id,  ['class'=>'form-control']) !!}
                                            {!! Form::hidden ('user_id', Auth::user()->id,  ['class'=>'form-control']) !!}
                                            {!! Form::submit ('Buy', ['class'=>'btn btn-block btn-primary btn-md']) !!}
                                            {!! Form::close() !!}
                                        @else
                                            <a href="{{ url('/login') }}" class="btn btn-block btn-primary btn-md">Buy</a>
                                        @endif

                                    </td>
                                </tr>

                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    <a href="#" class="close">Закрыть окно</a>
                </div>
            </div>
            <div id="header">{{$company->name}}</div>

            <div id="content">

            </div>
            <div id="action">
                <h3>{{$company->certificats[0]->price}}</h3>

                <form action="">
                    <a href="#zatemnenie">BUY</a>
                </form>
            </div>
        <div>
            <h4>Description:</h4>
            <h5>{{$company->description}}</h5>
            <h4>Certificats:</h4>
            @foreach($company->certificats as $certificate)
                <h5>{{$certificate->name}}</h5>
            @endforeach
        </div>
        <br>
        <br>

    </div>
@endsection


