@extends('adminLte.dashboard')
@section('content')
<h1>Historia zmian ocen</h1>
<table class="table">
<thead>
    <tr>
    <th scope="col">Ocena pierwsza</th>
    <th scope="col">Ocena zmieniona</th>
    <th scope="col">Komentarz</th>
    <th scope="col">Data zmiany</th>
    <th scope="col">Data orginału</th>
    </tr>
</thead>
<tbody>

    @foreach($data as $row)
    <tr>
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