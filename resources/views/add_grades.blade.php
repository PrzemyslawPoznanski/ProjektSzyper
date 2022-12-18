@extends('adminLte.dashboard')
@section('content')

<h1>Add grade</h1><br>



<form method="POST" action="add_grade">
    @csrf
    @if($errors->any())
    @foreach ($errors->all() as $err)
    <li class="alert alert-danger" role="alert">{{$err}}</li>
    @endforeach
    @endif

    <label>Student name</label>
    <select name="row" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

    @foreach($data as $row)
        <option value="{{$row->id}}" {{$row->id == $row->id  ? 'selected' : ''}}>{{$row->name}}</option>
    @endforeach
    </select><br>

    <label>Grade</label>
    <input type="text" name="grade" placeholder="Grade"  class="form-control" id="exampleFormControlInput1">
    </input><br>

    <label>Subject</label>
    <select name="subjectName" class="form-control" id="inputSubject">
        <option value="" disabled selected>Choose subject</option>
        <option value="Maths">Maths</option>
        <option value="History">History</option>
        <option value="Physics">Physics</option>
    </select>
    </input>

    <br>
    <label>Comment</label>
    <textarea type="text" name="comment" placeholder="Comment" class="form-control" id="exampleFormControlTextarea1" rows="3">

    </textarea><br><br>
    <input type = "submit"  class="btn btn-secondary">
</form>

@endsection
