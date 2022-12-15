@extends('adminLte.dashboard')
@section('content')
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<h1>Dodawanie ocen</h1><br><br>



<form method="POST" action="add">
    @csrf
    @if($errors->any())
    @foreach ($errors->all() as $err)
    <li class="alert alert-danger" role="alert">{{$err}}</li>
    @endforeach
    @endif

    <label>Uczeń imię</label>
    <select name="row" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
 
    @foreach($data as $row)
        <option value="{{$row->id}}" {{$row->id == $row->id  ? 'selected' : ''}}>{{$row->name}}</option>
    @endforeach
    </select><br><br>

    <label>Ocena</label> 
    <input type="text" name="grade" placeholder="Ocena"  class="form-control" id="exampleFormControlInput1"> 
    </input><br>

    <br><br>
    <label>Komentarz</label> 
    <textarea type="text" name="comment" placeholder="Komentarz" class="form-control" id="exampleFormControlTextarea1" rows="3"> 

    </textarea><br><br>
    <input type = "submit"  class="btn btn-secondary">
</form>

@endsection