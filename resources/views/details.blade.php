@extends('layouts.head')

@section('content')
    <style>
        .hide[aria-expanded="true"]{
            display: none;
        }
    </style>

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
            <div  id="app-navbar-collapse">
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
                <div id="Div2">
                    <div class="form-group">
                        <h4>Description:</h4>
                        <h5>{{$company->description}}</h5>
                        <h4>Certificats:</h4>
                        @foreach($company->certificats as $certificate)
                            <h5>{{$certificate->name}}</h5>
                        @endforeach
                    </div>
                </div>
                <div id="Div1">
                    <div class="panel-body">
                        {!! Form::open(['method'=>'POST', 'action'=>'CompanyReviewsController@store']) !!}
                        <div class="form-group">
                            {!! Form::label ('comment', 'Comment:') !!}
                            {!! Form::textarea ('comment', null, ['class'=>'form-control', 'rows'=>'2']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label ('rating', 'Rating:') !!}
                            {!! Form::number ('rating', 1, ['min'=>1,'max'=>5],['class'=>'form-control']) !!}
                        </div>
                        {!! Form::hidden ('company_id', $company->id,  ['class'=>'form-control']) !!}
                        <div class="form-group">
                            {!! Form::submit ('Submit', ['class'=>'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="panel-body">

                        @if($company->reviews)
                            @foreach($company->reviews as $review)
                                <div class="container">
                                    <div class="media mb-2">
                                        <img height="64" class="media-object" src="https://thumbs.dreamstime.com/b/default-avatar-profile-icon-vector-user-image-179582665.jpg">
                                        <div class="media-body">
                                            <h5>{{$review->user->name}}
                                                <small>{{$review->created_at->diffForHumans()}}</small>
                                            </h5>
                                            <p>{{$review->comment}}</p>
                                            <button class="btn btn-sm btn-primary hide" type="button" data-toggle="collapse" data-target="#form-toggle{{$review->id}}" aria-expanded="false" aria-controls="form-toggle">Reply</button>
                                            @if($review->user->id == Auth::user()->id)
                                                {!! Form::open(['method'=>'DELETE', 'action'=>['CompanyReviewsController@destroy', $review->id]]) !!}
                                                <div class="form-group col-md-2">
                                                    {!! Form::submit ('Delete', ['class'=>'btn btn-sm btn-danger']) !!}
                                                </div>
                                                {!! Form::close() !!}
                                            @endif
                                            <div class="collapse" id="form-toggle{{$review->id}}">
                                                {!! Form::open(['method'=>'POST', 'action'=>'ReviewRepliesController@store']) !!}
                                                <div class="form-group">
                                                    {!! Form::label ('comment', 'Comment:') !!}
                                                    {!! Form::textarea ('comment', null, ['class'=>'form-control', 'rows'=>'1']) !!}
                                                </div>
                                                {!! Form::hidden ('review_id', $review->id,  ['class'=>'form-control']) !!}
                                                <div class="form-group">
                                                    {!! Form::submit ('Submit', ['class'=>'btn btn-primary']) !!}
                                                </div>
                                                {!! Form::close() !!}

                                            </div>
                                            @if($review->replies)
                                                @foreach($review->replies as $reply)
                                                    <div class="media mt-3">
                                                        <a class="pull-left" href="#">
                                                            <img height="64" class="media-object" src="https://thumbs.dreamstime.com/b/default-avatar-profile-icon-vector-user-image-179582665.jpg">
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading">{{$reply->user->name}}
                                                                <small>{{$reply->created_at->diffForHumans()}}</small>
                                                            </h4>
                                                            <p>{{$reply->comment}}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
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