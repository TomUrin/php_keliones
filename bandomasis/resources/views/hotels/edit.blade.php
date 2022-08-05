@extends('layouts.app')
@push('styles')
<link href="{{mix('resources/sass/mechanicCard.scss')}}" rel="stylesheet">
@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">Edit hotel information</div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a class="btn btn-outline-success mb-2" href="{{route('hotels-index')}}">Back to the hotels list</a>
                    </div>
                    <form method="post" action="{{route('hotels-update', $hotels)}}" enctype="multipart/form-data">
                        
                        @if (Auth::user()->role > 9)
                        <div class="form-group mt-4">
                            <label>Hotel</label>
                            <input name="newTitle" type="text" class="form-control" value="{{$hotels->title}}">
                            <div class="form-group mt-4">
                                <label for="exampleInputPassword1" class="form-label">Country</label>
                            <div>
                                <select name="newCountry" class="form-select">
                                    @foreach($countries as $country)
                                    <option value="{{$country->id}}">{{$country->title}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            </div>
                            <div class="form-group mb-3">
                            <label for="exampleInputEmail1" class="form-label">Price &#8364</label>
                            <input name="newPrice" type="text" class="form-control" value="{{$hotels->price}}">
                            <div style="color: crimson;">{{ $errors->first('price') }}</div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1" class="form-label">Trips duration (days)</label>
                            <input name="newDuration" type="text" class="form-control" value="{{$hotels->duration}}">
                            <div style="color: crimson;">{{ $errors->first('duration') }}</div>
                        </div>
                            <div class="form-group mt-4">
                                <label>Photo</label>
                                <div>
                                    <img class="photo-box" src="{{ $hotels->image_path }}" />
                                    <input name="hotel_photo" type="file" class="form-control">
                                </div>
                            </div>
        
                            <div class="mx-auto mt-4">
                                <button type="submit" name="submit" value="send" class="btn btn-outline-success btn-sm">EDIT</button>
                            </div>
                            @endif
                @csrf
                @method('put')
                </form>
                @if (Auth::user()->role < 9) @if($hotels->image_path)
                    <form method="post" action="{{route('hotels-delete-picture', $hotels)}}" enctype="multipart/form-data">
                        <button type="submit" class="btn btn-outline-danger btn-sm">Delete photo</button>
                        @csrf
                        @method('put')
                    </form>
                    @endif
                    @endif
                    
                    @endsection