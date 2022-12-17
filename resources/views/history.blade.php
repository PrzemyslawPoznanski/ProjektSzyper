
<h1>Tu powinny się wyświelić historia oceny</h1>
<table class="table">
<thead>
    <tr>
    <th scope="col">Ocena</th>
    <th scope="col">Komentarz</th>
    <th scope="col">Data zmiany</th>

    </tr>
</thead>
<tbody>
    @foreach($data as $row)
    <tr>
        <td>{{$row->previous_grade}}</td>
        <td>{{$row->comment}}</td>
        <td>{{$row->created_at}}</td>
    </tr>
    @endforeach
</tbody>
</table>
