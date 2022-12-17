@extends('adminLte.dashboard')
@section('content')
<h1>Grade change history</h1>
<table class="table table-bordered">
<thead>
    <tr>
    <th scope="col">User</th>
    <th scope="col">Grade before change</th>
    <th scope="col">Grade after change</th>
    <th scope="col">Comment</th>
    <th scope="col">Date of change</th>
    <th scope="col">Original grade date</th>
    </tr>
</thead>
<tbody>

    @foreach($data as $row)
    <tr>
        <td>{{$row->name}}</td>
        <td>{{$row->previous_grade}}</td>
        <td>{{$row->grade_value}}</td>
        <td>{{$row->comment}}</td>
        <td>{{$row->history_created_at}}</td>
        <td>{{$row->created_at}}</td>
    </tr>


    @endforeach

</tbody>
</table>
@endsection
