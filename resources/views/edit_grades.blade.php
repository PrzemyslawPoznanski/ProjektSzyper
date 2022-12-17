<h1>Edit grade</h1>

<form action="/edit" method="POST">
@csrf
    <input type="hidden" name="id" value="{{$data['id']}}"><br><br>
    <input type="hidden" name="name" value="{{$data['name']}}"><br><br>
    <input type="text" name="grade_value" value="{{$data['grade_value']}}"><br><br>
    <input type="text" name="comment" value="{{$data['comment']}}"><br><br>
    <button>Aktualizuj</button>
</form>