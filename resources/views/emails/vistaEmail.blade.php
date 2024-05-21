<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail</title>
</head>
<body>
    <h2>Dades accés area privada</h2>
    <p>Usuari: {{ $details['email'] }}</p>
    <p>Contrasenya: {{ $details['password'] }}</p>
    <p>Recorda que al entrar canvia la contrasenya per tenir una major seguretat, si entras desde aquest link podras canviar la contrasenya: http://gracercoop.com</p>
</body>
</html>