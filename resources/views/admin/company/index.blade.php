@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>Companies:</h1>
                    </div>

                    <div class="panel-body">
                        <a href="{{route('admin.company.create' )}}">Add company</a>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Subcategory</th>
                                <th scope="col">Created</th>
                                <th scope="col">Updated</th>
                                <th scope="col">Show</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($companies)
                                @foreach($companies as $company)
                                    <tr>
                                        <td>{{$company->id}}</td>
                                        <td><a href="{{route('details.show' , $company->id)}}">{{$company->name}}</a></td>
                                        <td><a href="{{url('/subcategory/' . $company->subcategory->id)}}">{{$company->subcategory->name}}</a></td>
                                        <td>{{$company->created_at->diffForHumans()}}</td>
                                        <td>{{$company->updated_at->diffForHumans()}}</td>
                                        <td><a href="{{route('admin.company.show' , $company->id)}}">show</a> </td>
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