@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">Country information</div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="d-grid gap-2">
                                <a class="btn btn-outline-success mb-2" href="{{route('countries-index')}}">Back to the countries list</a>
                            </div>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Country</th>
                                <th scope="col">Start of season</th>
                                <th scope="col">End of season</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row"> {{$countries->title}} </td>
                                <td scope="row"> {{$countries->seasonStart}} </td>
                                <td scope="row"> {{$countries->seasonEnd}} </td>
                            </tr>
                        </tbody>
                        @csrf
                        @method('show')
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection