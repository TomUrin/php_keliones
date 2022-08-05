@extends('layouts.app')
@push('styles')
<link href="{{mix('resources/sass/mechanicCard.scss')}}" rel="stylesheet">
@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="d-grid gap-2 col-md-4">
            <a class="btn btn-outline-success mb-2" href="{{route('hotels-index')}}">Back to the mechanics list</a>
        </div>
    </div>
    <div class="container d-flex justify-content-center mt-5">
        <div class="card text-center mb-5">
            <div class="circle-image">
                <img src="{{$hotel->image_path}}" width="50">
            </div>
            <span class="name mb-1 fw-500">{{$hotel->title}} </span>
            <br>
        </div>
    </div>
    @csrf
    @method('show')
</div>
</div>
</div>
</div>
</div>

@endsection
