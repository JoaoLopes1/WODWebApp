<?php
    include("php/conexao2.php");
    if(isset($_POST["userNAME"]) || isset($_POST['userPASSW']) || isset($_POST['userMAIL'])){
        $userNAME= $_POST['userNAME'];
        $userMAIL= $_POST['userMAIL'];
        $userPASSW= $_POST['userPASSW'];

        if(strlen($_POST['userNAME'])== 0){
            echo "<script>alert('Preencha seu Usuário');</script>";
        } else if(strlen($_POST['userPASSW'])== 0){
            echo "<script>alert('Preencha sua Senha');</script>";
        } else if(strlen($_POST['userMAIL']) == 0) {
            echo "<script>alert('Preencha seu E-mail');</script>";
        } else {
            //Vendo se ja tem esse e-mail
            $sql_userMAIL = "SELECT * FROM login WHERE userMAIL = '$userMAIL'";
            $sql_query = $conexao->query($sql_userMAIL) or ("Falha na execução do código SQL: ".mysqli_error($mysqli));

            //Vendo se ja tem esse usuário
            $sql_user = "SELECT * FROM login WHERE userNAME = '$userNAME'";
            $sql_query2 = $conexao->query($sql_user) or ("Falha na execução do código SQL:".mysqli_error($mysqli));

            $quantidade_userMAIL = $sql_query->num_rows;
            $quantidade_userNAME = $sql_query2->num_rows;
            
            if($quantidade_userMAIL == 1){
                echo "<script>alert('Email já cadastrado. Tente fazer Login');</script>";
            }

            elseif($quantidade_userNAME ==1) {
                echo "<script>alert('Usuário já cadastrado. Tente fazer Login');</script>";
            }
            
            else{
                $sql="INSERT INTO login(userNAME, userMAIL, userPASSW) VALUES ('$userNAME', '$userMAIL', '$userPASSW')";

                if(mysqli_query($conexao, $sql)) {
                echo "Usuário cadastrado com sucesso!";
                header("Location: index.php");
                }

                else{
                    echo"Erro:";

                }
                mysqli_close($conexao);
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
    <title>Criar Conta</title>
</head>
<body>
    <section id="background_image" ></section>
    <div id="fade" class=""></div>
        <div id="modal" class="">
            <div class="modal-header">
                <h2>Criar Conta</h2>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <p>Digite seus dados para acessar.</p>   

                    <label>Usuário</label>
                    <input type="text" name="userNAME" placeholder="Digite seu usuário">
                    
                    <label>E-mail</label>
                    <input type="e-mail" name="userMAIL" placeholder="Digite seu e-mail">

                    <label>Senha</label>
                    <input type="password" name="userPASSW" placeholder="Digite sua senha">
                    
                    <a href="#">Esqueci minha senha</a>
                    <input type="submit" value="Criar"/>

                    <p>Já possui uma conta? <a href="index.php">Entre Agora</a> </p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

