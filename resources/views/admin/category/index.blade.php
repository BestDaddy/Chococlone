@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>Categories:</h1>
                    </div>

                    <div class="panel-body">
                        <a href="{{route('admin.category.create' )}}">Add category</a>
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
                            @if($categories)
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->created_at->diffForHumans()}}</td>
                                        <td>{{$category->updated_at->diffForHumans()}}</td>
                                        <td><a href="{{route('admin.category.show' , $category->id)}}">more</a> </td>
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