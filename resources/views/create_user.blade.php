@extends('adminLte.dashboard')

@section('content')

    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New User</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="user_list"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="add_user">
        @csrf
        @if($errors->any())
            @foreach ($errors->all() as $err)
                <li class="alert alert-danger" role="alert">{{$err}}</li>
            @endforeach
        @endif

        <label>Imię</label>
        <input type="text" name="name" placeholder="Imię"  class="form-control" id="inputName">
        <br>

        <label>Email</label>
        <input type="text" name="email" placeholder="Email"  class="form-control" id="inputEmail">
        <br>

        <label>Hasło</label>
        <input type="text" name="password" placeholder="Hasło"  class="form-control" id="inputPassword">
        <br>

        <label>Rola użytkownika</label>
        <select name="role" class="form-control" id="inputRole">
            <option value="" disabled selected>Wybierz rolę</option>
            <option value="admin">Admin</option>
            <option value="teacher">Nauczyciel</option>
            <option value="student">Uczeń</option>
        </select>
        <br>

        <input type = "submit"  class="btn btn-secondary">
    </form>
@endsection
