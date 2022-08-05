@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">Add new country</div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a class="btn btn-outline-success mb-5" href="{{route('countries-index')}}">Click here to see countries list</a>
                    </div>
                    <form class="create" action="{{route('countries-store')}}" method="post" type="submit">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Country</label>
                            <input name="country" type="text" class="form-control">
                            <div style="color: crimson;">{{ $errors->first('title') }}</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Start of season</label>
                            <input name="seasonStart" type="text" class="form-control">
                            <div style="color: crimson;">{{ $errors->first('seasonStart') }}</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">End of season</label>
                            <input name="seasonEnd" type="text" class="form-control">
                            <div style="color: crimson;">{{ $errors->first('seasonEnd') }}</div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-3">
                                <div class="d-grid gap-2">
                                    <button type="submit" name="submit" value="send" class="btn btn-outline-success mt-5 btn-lg">ADD</button>
                                </div>
                            </div>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection