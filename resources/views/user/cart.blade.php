@extends('layouts.head')

@section('content')

    <div class="container">
        <div id="page">
            <div id="header">Cart</div>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Count</th>
                    <th scope="col">Total</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @if($orders)
                    @foreach($orders as $order)
                        <tr>
                            <td><a href="{{ url('/details/'.$order->certificate->company->id) }}">{{$order->certificate->name}}</a></td>
                            <td>{{$order->certificate->price}}</td>
                            <td>
                                {{$order->count}}
{{--                                {!! Form::open(['method'=>'UPDATE', 'action'=>['UserOrdersController@update', $order->id]]) !!}--}}
{{--                                {!! Form::number ('count', $order->count,  ['class'=>'form-control']) !!}--}}
{{--                                {!! Form::submit ('Delete', ['class'=>'btn btn-block btn-primary btn-md']) !!}--}}
{{--                                {!! Form::close() !!}--}}
                            </td>
                            <td>{{$order->count*$order->certificate->price}}</td>
                            <td>
                                {!! Form::open(['method'=>'DELETE', 'action'=>['UserOrdersController@destroy', $order->id]]) !!}
                                {!! Form::submit ('Delete', ['class'=>'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>

                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
        <br>
        <br>

@endsection


