@extends('adminLte.dashboard')
@section('content')
<h1>Tu powinny się wyświelić oceny</h1>
<table class="table">
<thead>
    <tr>
    <th scope="col">Uczeń</th>
    <th scope="col">Ocena</th>
    <th scope="col">Komentarz</th>
    @if($user = Auth::user()->role=='admin' or $user = Auth::user()->role=='teacher')
    <th  scope="col">Zobacz historie oceny</th>
    @endif
    </tr>
</thead>
<tbody>
    @foreach($data as $row)
    <tr>
        <td>{{$row->name}}</td>
        <td>{{$row->grade_value}}</td>
        <td>{{$row->comment}}</td>
        @if($user = Auth::user()->role=='admin' or $user = Auth::user()->role=='teacher')
        <td><a class="btn btn-secondary">Historia</a></td>
        @endif
    </tr>
    
    @endforeach
</tbody>
</table>

@endsection