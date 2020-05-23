@extends('layouts.head')

@section('content')

    <div class="container">
        <div id="page">
            <div id="header">Cart</div>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
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
                            <td>{{$order->id}}</td>
                            <td>{{$order->certificate->name}}</td>
                            <td>{{$order->certificate->price}}</td>
                            <td>{{$order->count}}</td>
                            <td>{{$order->count*$order->certificate->price}}</td>
                            <td>Delete</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
        <br>
        <br>

@endsection


