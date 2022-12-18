@extends('adminLte.dashboard')
@section('content')

    <h1>Add new user</h1><br>



    <form method="POST" action="add_user">
        @csrf
        @if($errors->any())
            @foreach ($errors->all() as $err)
                <li class="alert alert-danger" role="alert">{{$err}}</li>
            @endforeach
        @endif

        <label>Name</label>
        <input type="text" name="name" placeholder="Name"  class="form-control" id="inputName">
        <br>

        <label>Email</label>
        <input type="text" name="email" placeholder="Email"  class="form-control" id="inputEmail">
        <br>

        <label>Password</label>
        <input type="text" name="password" placeholder="Password"  class="form-control" id="inputPassword">
        <br>

        <label>User role</label>
        <select name="role" class="form-control" id="inputRole">
            <option value="" disabled selected>Choose role</option>
            <option value="admin">Admin</option>
            <option value="teacher">Teacher</option>
            <option value="student">Student</option>
        </select>
        <br>

        <input type = "submit"   class="btn btn-secondary">
    </form>

@endsection
