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
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li>
                        <input id="Button1" type="button" value="Information" onclick="switchVisible();"/>
                    </li>
                    <li>
                        <input id="Button1" type="button" value="Reviews" onclick="switchVisible();"/>
                    </li>
                </ul>
            </div>
            <div id="info">
                <div id="Div1">
                    <div class="form-group">
                        <h4>Description:</h4>
                        <h5>{{$company->description}}</h5>
                        <h4>Certificats:</h4>
                        @foreach($company->certificats as $certificate)
                            <h5>{{$certificate->name}}</h5>
                        @endforeach
                    </div>
                </div>
                <div id="Div2">
                    <div class="panel-body">
                        {!! Form::open(['method'=>'POST', 'action'=>'CompanyController@store']) !!}
                        <div class="form-group">
                            {!! Form::label ('comment', 'Comment:') !!}
                            {!! Form::text ('comment', null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label ('rating', 'Rating:') !!}
                            {!! Form::number ('rating', 1, ['min'=>1,'max'=>5],['class'=>'form-control']) !!}
                        </div>
                        {!! Form::hidden ('company_id', $company->id,  ['class'=>'form-control']) !!}
                        @if(Auth::user())
                        <div class="form-group">
                            {!! Form::submit ('Add review', ['class'=>'btn btn-primary']) !!}
                        </div>
                        @else
                            <a href="{{ url('/login') }}">Add review</a>
                        @endif
                        {!! Form::close() !!}
                    </div>
                    <div class="panel-body">

                        @if($company->reviews)
                            @foreach($company->reviews as $review)
                                <div>
                                    <table>
                                        <tr>
                                            <td>{{$review->user->name}}  {{$review->created_at->diffForHumans()}}</td>
                                        </tr>
                                        <tr>
                                            <td>Rate: {{$review->rating}}</td>
                                        </tr>
                                    </table>
                                    <h3>{{$review->comment}}</h3>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        function switchVisible() {
            if (document.getElementById('Div1')) {

                if (document.getElementById('Div1').style.display == 'none') {
                    document.getElementById('Div1').style.display = 'block';
                    document.getElementById('Div2').style.display = 'none';
                }
                else {
                    document.getElementById('Div1').style.display = 'none';
                    document.getElementById('Div2').style.display = 'block';
                }
            }
        }
    </script>
@endsection