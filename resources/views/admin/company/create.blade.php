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
                        <div class="form-group">
                            {!! Form::label ('discount', 'Discount:') !!}
                            {!! Form::text ('discount', null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label ('categories', 'Categories:') !!}
                            <select class="form-control" id="categories" name="categories" >
                                <option value="">Select category</option>
                                @foreach($categories as $key=> $value)
                                    <option value=" {{$key}}"> {{$value}}</option>

                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            {!! Form::label ('subcategory_id', 'Subcategories:') !!}
                            <select name="subcategory_id" id="subcategory_id" class="form-control" >
                                <option value="">Select subcategory</option>
{{--                                @foreach($subcategories as $subcategory)--}}
{{--                                    @if($subcategory->category->id == $sel->id)--}}
{{--                                        <option value="{{$subcategory->id}} "> {{$subcategory->name}} </option>--}}
{{--                                    @endif--}}
{{--                                @endforeach--}}
                            </select>
                        </div>

{{--                        <div class="form-group">--}}
{{--                            {!! Form::label ('subcategory_id', 'Subcategory:') !!}--}}
{{--                            {!! Form::select ('subcategory_id', [''=>'Choose subcategory'] + $subcategories, ['class'=>'form-control']) !!}--}}
{{--                        </div>--}}

                        <div class="form-group">
                            {!! Form::submit ('Create company', ['class'=>'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>



{{--    <script>--}}
{{--        function showcategory(){--}}
{{--            var selectBox = document.getElementById('categories');--}}
{{--            var userInput = selectBox.options[selectBox.selectedIndex].value ;--}}
{{--            if (userInput){--}}
{{--                document.getElementById('subcategory_id').style.visibility = 'visible';--}}
{{--                {{$apple = 1}}--}}
{{--            }else{--}}
{{--                document.getElementById('subcategory_id').style.visibility = 'hidden';--}}
{{--            }--}}
{{--            return false;}--}}
{{--    </script>--}}
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
        // $(document).ready(function () {
        //     console.log("FUCk eeeee");
        // });

    </script>
@endsection