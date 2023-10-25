<?php
if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION["userID"])) {
    die("Você não pode acessar esta página porque não está logado.<p><a href=\"index.php\">Entrar</a></p>");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proteção</title>
</head>
<body>
    
</body>
</html>