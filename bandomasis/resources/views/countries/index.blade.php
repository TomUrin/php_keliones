@extends('layouts.app')

@section('title')
Countries
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            {{-- @include('front.box') --}}
            <div class="card">
                <div class="card-header">Countries list</div>
                <div class="card-body">
                    @if (Auth::user()->role > 9)
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="d-grid gap-2">
                                <a class="btn btn-outline-success mb-2" href="{{route('countries-create')}}">Click here to add new country</a>
                            </div>
                        </div>
                    </div>
                    @endif
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Country</th>
                                <th scope="col">Start of season</th>
                                <th scope="col">End of season</th>
                                <th scope="col"></th>
                        </thead>
                        @foreach($countries as $country)
                        <tbody>
                            <tr>
                                <td scope="row"> {{$country->title}} </td>
                                <td scope="row"> {{$country->seasonStart}} </td>
                                <td scope="row"> {{$country->seasonEnd}} </td>
                                @if (Auth::user()->role > 9)
                                <td scope="row" class="actions">
                                    <a class="btn btn-outline-info btn-sm me-2 " href="{{route('countries-show', $country->id)}}">SHOW</a>
                                    <a class="btn btn-outline-warning btn-sm me-2 " href="{{route('countries-edit', $country)}}">EDIT</a>
                                    <form method="POST" action="{{route('countries-delete', $country)}}">
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