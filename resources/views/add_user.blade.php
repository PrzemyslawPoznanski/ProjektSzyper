@extends('adminLte.dashboard')
@section('content')
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

    <h1>Dodawanie użytkowników</h1><br><br>



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
