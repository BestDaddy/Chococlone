@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>Company: {{$company->name}}</h1>

                    </div>

                    <div class="panel-body">

                        <div class="form-group">
                            <p>{{$company->description}}</p>
                        </div>
                        {!! Form::model($certificate, ['method'=>'PATCH', 'action'=>['AdminCertificatesController@update', $certificate->id]]) !!}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                {!! Form::label ('name', 'Name:') !!}
                                {!! Form::text ('name', null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label ('price', 'Price:') !!}
                                {!! Form::number ('price', null, ['min'=>100,'max'=>1000000], ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label ('discount', 'Discount:') !!}
                                {!! Form::number ('discount', null,  ['min'=>1,'max'=>100], ['class'=>'form-control']) !!}
                            </div>

                            <input type="hidden" name="company_id" value="{{$company->id}}">
                            <div class="form-group">
                                {!! Form::submit ('Update', ['class'=>'btn btn-primary']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}

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
                                            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminCertificatesController@destroy', $certificate->id]]) !!}
                                            {!! Form::submit ('Delete', ['class'=>'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>

                                @endforeach
                            @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection