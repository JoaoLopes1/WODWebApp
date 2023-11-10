<?php
include('protect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chars</title>
</head>
<body>
    Bem Vindo ao CHARS, <?php echo $_SESSION['userNAME']; ?>

    <a href="char_create1/tradition.html">Criar</a> Personagem
<p>
    <a href="logout.php">Sair</a>
</p>
</body>
</html>