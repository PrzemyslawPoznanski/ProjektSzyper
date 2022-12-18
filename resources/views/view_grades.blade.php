@extends('adminLte.dashboard')
@section('content')
<h1>Grades</h1>
<table class="table table-bordered">
<thead>
        <tr>
    @if($user = Auth::user()->role=='admin' or $user = Auth::user()->role=='teacher')
        <th scope="col">Student</th>
    @endif
        <th scope="col">Grade</th>
        <th scope="col">Subject</th>
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
        @if($user = Auth::user()->role=='admin' or $user = Auth::user()->role=='teacher')
            <td>{{$row->name}}</td>
        @endif
            <td>{{$row->grade_value}}</td>
            <td>{{$row->subject}}</td>
            <td>{{$row->comment}}</td>
            <td>{{$row->updated_at}}</td>
        @if($user = Auth::user()->role=='admin' or $user = Auth::user()->role=='teacher')
            <td><a class="btn btn-secondary" href={{"edit/".$row['id']}}>Edit</a></td>
        @endif
        </tr>

    @endforeach
</tbody>
</table>

@endsection
