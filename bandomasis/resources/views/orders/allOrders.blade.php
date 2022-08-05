@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">Orders</div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Client name</th>
                                <th scope="col">Country</th>
                                <th scope="col">Hotel</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Price</th>
                                <th scope="col">Status</th>
                                <th scope="col">Change status</th>
                            </tr>
                        </thead>
                        @foreach($orders as $order)
                        <tbody>
                            <tr>
                                <td scope="row"> {{$order->client->name}} </td>
                                <td scope="row"> {{$order->country->title}} </td>
                                <td scope="row"> {{$order->hotel->title}} </td>
                                <td scope="row"> {{$order->hotel->duration}} </td>
                                <td scope="row"> {{$order->hotel->price}}</td>
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
                                <td scope="row" class="status">
                                    <form class="delete form statusForm" action="{{route('selectedServices-status', $order)}}" method="post">
                                        @csrf
                                        @method('put')
                                        <select class="form-select form-select-sm" name="status">
                                            @foreach($statuses as $key => $status)
                                            <option value="{{$key}}" @if($key==$order->status) selected @endif>{{$status}}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn btn-primary btn-sm ms-3 mt-2">Set status</button>
                                    </form>
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
