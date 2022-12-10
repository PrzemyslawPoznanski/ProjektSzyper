<form action="FileController" method="post" enctype="multipart/form-data">
@csrf
    <input type="file" name="file">
    <input type="submit" value="wyśli plik">
</form>