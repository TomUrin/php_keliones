@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">Add new hotel</div>
                <div class="card-body">

                    <div class="d-grid gap-2">
                        <a class="btn btn-outline-success mb-5" href="{{route('hotels-index')}}">Click here to see hotels list</a>
                    </div>

                    <form class="create" action="{{route('hotels-store')}}" method="post" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                            <label for="exampleInputPassword1" class="form-label">Country</label>
                            <div>
                                <select name="country" class="form-select">
                                    @foreach($countries as $country)
                                    <option value="{{$country->id}}">{{$country->title}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div style="color: crimson;">{{ $errors->first('workshop') }}</div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1" class="form-label">Hotel</label>
                            <input name="hotel" type="text" class="form-control">
                            <div style="color: crimson;">{{ $errors->first('hotel') }}</div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1" class="form-label">Price &#8364</label>
                            <input name="price" type="text" class="form-control">
                            <div style="color: crimson;">{{ $errors->first('price') }}</div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1" class="form-label">Trips duration (days)</label>
                            <input name="duration" type="text" class="form-control">
                            <div style="color: crimson;">{{ $errors->first('duration') }}</div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputPassword1" class="form-label">Photo</label>
                            <input name="hotel_photo" type="file" class="form-control">
                            <div style="color: crimson;">{{ $errors->first('photo') }}</div>
                        </div>
                        
                        @csrf
                        @method('post')
                        <div class="row justify-content-center">
                            <div class="col-md-3">
                                <div class="d-grid gap-2">
                                    <button type="submit" name="submit" value="send" class="btn btn-outline-success mt-5 btn-lg">ADD</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
