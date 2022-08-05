@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">Choose hotel</div>
                <div class="card-body">
                    <form class="create" action="{{route('pickHotel-add')}}" method="post" type="submit" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="createServices">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Choose country</label>
                                <div>
                                    <select name="country_id" class="form-select">
                                        @foreach($countries as $country)
                                        <option value="{{$country->id}}">{{$country->title}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div style="color: crimson;">{{ $errors->first('workshop') }}</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Choose hotel</label>
                                <div>
                                    <select name="hotel_id" class="form-select">
                                        @foreach($hotels as $hotel)
                                        <option value="{{$hotel->id}}">{{$hotel->title}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div style="color: crimson;">{{ $errors->first('workshop') }}</div>
                            </div>
                        </div>
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
