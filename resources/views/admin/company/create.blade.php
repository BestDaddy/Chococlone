@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>Create company:</h1>
                    </div>

                    <div class="panel-body">
                        {!! Form::open(['method'=>'POST', 'action'=>'AdminCompaniesController@store']) !!}
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
{{--                        <div class="form-group">--}}
{{--                            <select class="form-control" id="categories" name="categories" onchange="return showcategory();">--}}
{{--                                @foreach($categories as $sel)--}}
{{--                                    <option value=" {{$sel->id}}"> {{$sel->name}}  {{$sel->id}}</option>--}}

{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
                        <div class="form-group">
                            <select name="subcategory_id" id="subcategory_id" class="form-control" >
                                @foreach($subcategories as $subcategory)
{{--                                    @if($subcategory->category->id == $sel->id)--}}
                                        <option value="{{$subcategory->id}} "> {{$subcategory->name}} </option>
{{--                                    @endif--}}
                                @endforeach
                            </select>
                        </div>

{{--                        <div class="form-group">--}}
{{--                            {!! Form::label ('subcategory_id', 'Subcategory:') !!}--}}
{{--                            {!! Form::select ('subcategory_id', [''=>'Choose subcategory'] + $subcategories, ['class'=>'form-control']) !!}--}}
{{--                        </div>--}}

                        <div class="form-group">
                            {!! Form::submit ('Create user', ['class'=>'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function showcategory(){
            var selectBox = document.getElementById('categories');
            var userInput = selectBox.options[selectBox.selectedIndex].value ;
            if (userInput){
                document.getElementById('subcategory_id').style.visibility = 'visible';
                {{$apple = 1}}
            }else{
                document.getElementById('subcategory_id').style.visibility = 'hidden';
            }
            return false;}
    </script>
@endsection