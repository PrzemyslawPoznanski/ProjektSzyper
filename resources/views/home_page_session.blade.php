<html>
    <head>
        <meta charset="uft-8">
    </head>
    <body>
        <h4>Witamy {{ session('data')['user']}}</h4><br><br>
        <h4>Hasło: {{ session('data')['password']}}</h4><br><br>
        <button action="logout">Wyloguj</button>
    </body>
</html>