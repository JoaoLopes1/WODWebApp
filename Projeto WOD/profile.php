<?php

include('protect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    Bem Vindo ao PROFILE, <?php echo $_SESSION['nome']; ?>

    <p>
        <a href="logout.php">Sair</a>
    </p>
</body>
</html>