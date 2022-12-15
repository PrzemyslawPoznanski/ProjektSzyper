<h1>Tu powinno się wyświelić dodawanie ocen</h1>



<form method="POST" action="add">
    @csrf
    <label>Przedmiot</label>
    <input type="text" name="id_subject" placeholder="(tymczasowo) id przedmiotu"><br><br>
    <label>Uczeń imię</label>
    <select name="row">
    @foreach($data as $row)
        <option value="{{$row->id}}" {{$row->id == $row->id  ? 'selected' : ''}}>{{$row->name}}</option>
    @endforeach
</select><br><br>
    <!-- <label>Email ucznia</label>
    <input type="text" name="email" placeholder="Email"><br><br> -->
    <label>Ocena</label> 
    <input type="text" name="grade" placeholder="Ocena"><br><br>
    <label>Komentarz</label> 
    <input type="text" name="comment" placeholder="Komentarz"><br><br>
    <input type = "submit">
</form>