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

                        {!! Form::open(['method'=>'POST', 'action'=>'AdminSubcategoriesController@store']) !!}
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
                            <div class="form-group col-md-6">
                                {!! Form::submit ('Add subcategory', ['class'=>'btn btn-primary']) !!}
                            </div>
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
                                @foreach($category->subcategories as $subcategory)
                                    <tr>
                                        <td>{{$subcategory->id}}</td>
                                        <td>{{$subcategory->name}}</td>
                                        <td>{{$subcategory->created_at->diffForHumans()}}</td>
                                        <td>{{$subcategory->updated_at->diffForHumans()}}</td>
                                        <td><a href="{{route('admin.category.subcategory.edit' , $subcategory->id)}}">edit</a></td>
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