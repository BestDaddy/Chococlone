@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>Create category:</h1>
                    </div>

                    <div class="panel-body">
                        {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}
                        <div class="form-group">
                            {!! Form::label ('name', 'Name:') !!}
                            {!! Form::text ('name', null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label ('description', 'Description:') !!}
                            {!! Form::textarea ('description', null, ['class'=>'form-control', 'rows'=>'2']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit ('Create category', ['class'=>'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

