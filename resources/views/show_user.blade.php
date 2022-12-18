@extends('layouts.empty_layout')

@section('content')

    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>User details</h2>
            </div>

        </div>
    </div><br>

    <div class="row">
        <div class="form-control">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $user->name }}
            </div>
        </div><br><br>
        <div class="form-control">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $user->email }}
            </div>
        </div><br><br>
        <div class="form-control">
            <div class="form-group">
                <strong>Role:</strong>
                {{ $user->role }}
            </div>
        </div><br><br>
        <div class="pull-left">
            <a class="btn btn-secondary" href="{{ route('users.index') }}"> Back</a>
        </div>
    </div>
@endsection
