@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>{{$category->name}}</h1>

                    </div>

                    <div class="panel-body">
                        <div style="float:right">
                            <a href="{{route('admin.category.edit' , $category->id)}}">edit</a>
                        </div>
                        <br>

                        {!! Form::model($subcategory, ['method'=>'PATCH', 'action'=>['AdminSubcategoriesController@update', $subcategory->id]]) !!}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                {!! Form::label ('name', 'Name:') !!}
                                {!! Form::text ('name', null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label ('description', 'Description:') !!}
                                {!! Form::text ('description', null,  ['class'=>'form-control']) !!}
                            </div>

                            <input type="hidden" name="category_id" value="{{$category->id}}">
                            <div class="form-group col-md-2">
                                {!! Form::submit ('Update', ['class'=>'btn btn-primary']) !!}
                            </div>
                            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminSubcategoriesController@destroy', $subcategory->id]]) !!}
                                <div class="form-group col-md-2">
                                    {!! Form::submit ('Delete', ['class'=>'btn btn-danger']) !!}
                                </div>
                            {!! Form::close() !!}
                        </div>
                        {!! Form::close() !!}

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Created</th>
                                <th scope="col">Updated</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($category->subcategories)
                                @foreach($category->subcategories as $sub)
                                    @if($sub->id != $subcategory->id)
                                        <tr>
                                            <td>{{$sub->id}}</td>
                                            <td>{{$sub->name}}</td>
                                            <td>{{$sub->created_at->diffForHumans()}}</td>
                                            <td>{{$sub->updated_at->diffForHumans()}}</td>
                                            <td><a href="{{route('admin.category.subcategory.edit' , $subcategory->id)}}">edit</a></td>
                                        </tr>
                                    @endif

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