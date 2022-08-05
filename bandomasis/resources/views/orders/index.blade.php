@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center row">
        <div class="col-md-12">
            <div class="rounded">
                <div class="card-header">My Orders</div>
                <div class="table-responsive table-borderless">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Country</th>
                                <th scope="col">Hotel</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Price &#8364</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>

                        @foreach($orders as $order)
                        <tbody class="table-body">
                            <tr class="cell-1">
                                <td scope="row"> {{$order->country->title}} </td>
                                <td scope="row"> {{$order->hotel->title}} </td>
                                <td scope="row"> {{$order->hotel->duration}} </td>
                                <td scope="row"> {{$order->hotel->price}} </td>
                                <td scope="row">
                                    @if($order->status == 1)
                                    <span class="badge rounded-pill bg-warning">{{$statuses[$order->status]}}</span>
                                    @endif
                                    @if($order->status == 2)
                                    <span class="badge rounded-pill bg-success">{{$statuses[$order->status]}}</span>
                                    @endif
                                    @if($order->status == 3)
                                    <span class="badge rounded-pill bg-danger">{{$statuses[$order->status]}}</span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
