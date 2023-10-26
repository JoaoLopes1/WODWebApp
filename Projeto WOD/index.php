<?php
    include("php/conexao.php");
    $msg = "";
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
    <link rel="stylesheet" href="styles/style_modal.css">
    <title>Login</title>
</head>
<body>
<div id="fade" class=""></div>
    <div id="modal" class="">
        <div class="modal-header">
            <h2>Login</h2>
            <p></p>
        </div>
        <div class="modal-body">
            <form action="" method="POST">
                <p>Digite seus dados para acessar.
                <div class="alerta_login"></div>
                </p>                
                <label>Usuário</label>
                <input type="text" name="userNAME" placeholder="Digite seu usuário">

                <label>Senha</label>
                <input type="password" name="userPASSW" placeholder="Digite sua senha">
                
                <input type="submit" value="Entrar"/>

                <p>Ainda não tem uma conta? <a href="criar_conta.php">Crie agora</a> </p>
            </form>
        </div>
    </div>

    <script src="scripts/script"></script>
</body>
</html>

