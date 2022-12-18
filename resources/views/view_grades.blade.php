@extends('adminLte.dashboard')
@section('content')
<h1>Grades</h1>
<table class="table table-bordered">
<thead>
    <tr>
     <th scope="col">id</th>
    <th scope="col">Student</th>
    <th scope="col">Grade</th>
    <th scope="col">Comment</th>
    <th scope="col">Date</th>
    @if($user = Auth::user()->role=='admin' or $user = Auth::user()->role=='teacher')
    <th  scope="col">Edit</th>
    @endif
    </tr>
</thead>
<tbody>
    @foreach($data as $row)
    <tr>
        <td>{{$row->id}}</td>
        <td>{{$row->name}}</td>
        <td>{{$row->grade_value}}</td>
        <td>{{$row->comment}}</td>
        <td>{{$row->created_at}}</td>
        <td><a class="btn btn-secondary" href={{"edit/".$row['id']}}>Edit</a></td>
    </tr>

    @endforeach
</tbody>
</table>

@endsection
