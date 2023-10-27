<?php
    include("php/conexao.php");
    if(isset($_POST["userNAME"]) || isset($_POST['userPASSW'])){
        
        if(strlen($_POST['userNAME'])== 0){
            echo "<script>alert('Preencha seu usuário');</script>";
        } else if(strlen($_POST['userPASSW'])== 0){
            echo "<script>alert('Preencha sua senha');</script>";
        } else {
        
            $userNAME = $mysqli ->real_escape_string($_POST['userNAME']);
            $userPASSW = $mysqli ->real_escape_string($_POST['userPASSW']);

            $sql_code = "SELECT * FROM login WHERE userNAME = '$userNAME' AND userPASSW = '$userPASSW'";
            $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: ".mysqli_error($mysqli));

            $quantidade = $sql_query->num_rows;
            
            if($quantidade == 1){

                $usuario = $sql_query->fetch_assoc();
                
                if(!isset($_SESSION)) {
                    session_start();
                }

                $_SESSION["userID"] = $usuario["userID"];
                $_SESSION["userNAME"] = $usuario["userNAME"];

                header("Location: home_page.php");

            }else {
                echo "<script>alert('Usuário ou Senha Incorretos');</script>";
            }

        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style_login.css">
    <title>Login</title>
</head>
<body>
    <section id="background_image" ></section>
    <div id="fade" class=""></div>
    <div id="modal" class="">
        <div class="modal-header">
            <h2>Login</h2>
        </div>
        <div class="modal-body">
            <form action="" method="POST">
        
                <label>Usuário</label>
                <input type="text" name="userNAME" placeholder="Digite seu usuário">

                <label>Senha</label>
                <input type="password" name="userPASSW" placeholder="Digite sua senha">
                
                <input type="submit" value="Entrar" class = "submit_button"/>

                <p>Ainda não tem uma conta? <a href="criar_conta.php">Crie agora</a> </p>
            </form>
        </div>
    </div>
    <script>
        const images = [
            'url("assets/img/VampireNEW.jpg")',
            'url("assets/img/mageteste.jpg")',
            'url("assets/img/werewolfNEW.jpg")',
        ];

        let currentPosition = 0;
        const section = document.getElementById('background_image');

        function changeBg() {
            section.style.opacity = 0; // Define a opacidade para 0 para ocultar a imagem atual

            setTimeout(function () {
            section.style.backgroundImage = images[currentPosition];
            section.style.opacity = 1; // Define a opacidade para 1 para exibir a nova imagem
            currentPosition = (currentPosition + 1) % images.length;
            }, 1000); // Tempo igual à duração da transição em CSS (1 segundo)
        }

        // Inicializa a primeira imagem
        section.style.backgroundImage = images[currentPosition];
        currentPosition = (currentPosition + 1) % images.length;

        setInterval(changeBg, 4000);
    </script>
    <script src="scripts/script"></script>
</body>
</html>

