@extends('adminLte.dashboard')
@section('content')
<h1>Tu powinny się wyświelić oceny</h1>
<table class="table">
<thead>
    <tr>
    <th scope="col">Uczeń</th>
    <th scope="col">Ocena</th>
    <th scope="col">Komentarz</th>
    <th scope="col">Data</th>
    @if($user = Auth::user()->role=='admin' or $user = Auth::user()->role=='teacher')
    <th  scope="col">Edit</th>
    @endif
    </tr>
</thead>
<tbody>
    @foreach($data as $row)
    <tr>
        <td>{{$row->name}}</td>
        <td>{{$row->grade_value}}</td>
        <td>{{$row->comment}}</td>
        <td>{{$row->created_at}}</td>
        <td><a class="btn btn-secondary">edytuj</a></td>
    </tr>
    
    @endforeach
</tbody>
</table>

@endsection