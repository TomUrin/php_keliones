@extends('layouts.app')
@section('title')
Car repair workshops
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">Hotels list</div>
                <div class="card-body">
                    @if (Auth::user()->role > 9)
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="d-grid gap-2">
                                <a class="btn btn-outline-success mb-2" href="{{route('hotels-create')}}">Click here to add new hotel</a>
                            </div>
                        </div>
                    </div>
                    @endif
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">HOTEL</th>
                                <th scope="col">PHOTO</th>
                                <th scope="col">COUNTRY</th>
                                <th scope="col">DURATION IN DAYS</th>
                                <th scope="col">PRICE &#8364</th>
                                @if (Auth::user()->role > 9)
                                <th scope="col">ACTIONS</th>
                                @endif
                        </thead>
                        @foreach($hotels as $hotel)
                        <tbody>
                            <tr>
                                <td scope="row"> {{$hotel->title}} </td>
                                <td scope="row">
                                    @if($hotel->image_path)
                                    <div class="circle-image mt-4">
                                        <img class="photo-box" src="{{ $hotel->image_path }}" />
                                    </div>
                                    @endif
                                </td>
                                <td scope="row"> {{$hotel->country->title}} </td>
                                <td scope="row"> {{$hotel->duration}} </td>
                                <td scope="row"> {{$hotel->price}} </td>
                                 @if (Auth::user()->role > 9)
                                <td class="actions">
                                    <a class="btn btn-outline-info btn-sm me-2 " href="{{route('hotels-show', $hotel->id)}}">SHOW</a>
                                   
                                    <a class="btn btn-outline-warning btn-sm me-2 " href="{{route('hotels-edit', $hotel)}}">EDIT</a>
                                    
                                    <form method="POST" action="{{route('hotels-delete', $hotel)}}">
                                       
                                        <button class="btn btn-outline-danger btn-sm mt-2" type="submit">DELETE</button>
                                       
                                </td>
                                 @endif
                            </tr>
                        </tbody>
                        @csrf
                        @method('delete')
                        </form>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
