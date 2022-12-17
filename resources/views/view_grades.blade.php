@extends('adminLte.dashboard')
@section('content')
<h1>Grades</h1>
<table class="table table-bordered">
<thead>
    <tr>
    <th scope="col">ID</th>
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
    @foreach($data as $item)
    <tr>
        <td>{{$item->id_of_grade}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->grade_value}}</td>
        <td>{{$item->comment}}</td>
        <td>{{$item->created_at}}</td>
        @if($user = Auth::user()->role=='admin' or $user = Auth::user()->role=='teacher')
        <td><a class="btn btn-secondary" href={{"edit/".$item['id_of_grade']}}>Edit</a></td>
        @endif
    </tr>

    @endforeach
</tbody>
</table>

@endsection
