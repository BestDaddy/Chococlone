@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>Edit company:</h1>
                    </div>
                    <div class="panel-body">
                        {!! Form::model($company, ['method'=>'PATCH', 'action'=>['AdminCompaniesController@update', $company->id]]) !!}
                        <div class="form-group">
                            {!! Form::label ('name', 'Name:') !!}
                            {!! Form::text ('name', null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label ('description', 'Description:') !!}
                            {!! Form::text ('description', null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label ('address', 'Address:') !!}
                            {!! Form::text ('address', null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label ('phone', 'Phone:') !!}
                            {!! Form::text ('phone', null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label ('discount', 'Discount:') !!}
                            {!! Form::text ('discount', null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label ('categories', 'Categories:') !!}
                            <select class="form-control" id="categories" name="categories" >
{{--                                <option selected>{{$company->subcategory->category->name}}</option>--}}
                                @foreach($categories as $key=> $value)
                                    @if($key == $company->subcategory->category->id)
                                        <option selected value=" {{$key}}"> {{$value}}</option>
                                    @else
                                        <option value=" {{$key}}"> {{$value}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            {!! Form::label ('subcategory_id', 'Subcategories:') !!}
                            <select name="subcategory_id" id="subcategory_id" class="form-control">
                                <option selected value="{{$company->subcategory->id}}">{{$company->subcategory->name}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            {!! Form::submit ('Update company', ['class'=>'btn btn-primary']) !!}
                        </div>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminCompaniesController@destroy', $company->id]]) !!}
                        <div class="form-group">
                            {!! Form::submit ('Delete', ['class'=>'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script>
        $(document).ready(function () {
            $('select[name="categories"]').on('change', function () {
                var category_id = $(this).val();
                if(category_id){
                    console.log(category_id);
                    $.ajax({
                        url: '{{ url('getSub/' ) }}' + '/' +category_id ,
                        type: 'GET',
                        dataType: 'json',
                        success:function (data) {
                            console.log(data);
                            $('select[name="subcategory_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="subcategory_id"]')
                                    .append('<option value="'+key+'">'+value+'</option>')
                            })
                        }
                    });
                } else{
                    $('select[name="subcategory_id"]').empty();
                }
            });
        });
    </script>
@endsection