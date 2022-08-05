@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">Edit countries information</div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="d-grid gap-2">
                                <a class="btn btn-outline-success mb-2" href="{{route('countries-index')}}">Back to the Countries list</a>
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
                        <form method="post" action="{{route('countries-update', $country)}}">
                            <tbody>
                                <tr>
                                    <td scope="row">
                                        <div class="input-group input-group-sm mb-3">
                                            <input name="newTitle" type="text" class="form-control" value="{{$country->title}}">
                                        </div>
                                    </td>
                                    <td scope="row">
                                        <div class="input-group input-group-sm mb-3 col-2">
                                            <input name="newSeasonStart" type="text" class="form-control" value="{{$country->seasonStart}}">
                                        </div>
                                    </td>
                                    <td scope="row">
                                        <div class="input-group input-group-sm mb-3">
                                            <input name="newSeasonEnd" type="text" class="form-control" value="{{$country->seasonEnd}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="mx-auto">
                                            <button type="submit" name="submit" value="send" class="btn btn-outline-success btn-sm">EDIT</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            @csrf
                            @method('put')
                        </form>
                    </table>
                    @endsection
