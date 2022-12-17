@extends('adminLte.dashboard')
@section('content')
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<h1>Edit grade</h1>

<form action="/edit" method="POST">
@csrf
    <input type="hidden" name="id" value="{{$data['id']}}" class="form-control" id="exampleFormControlInput1"><br><br>
    <input type="text" name="grade_value" value="{{$data['grade_value']}}" class="form-control" id="exampleFormControlInput1"><br><br>
    <input type="text" name="comment" value="{{$data['comment']}}" class="form-control" id="exampleFormControlInput1"><br><br>
    <button>Aktualizuje</button>
</form>
@endsection