<?php
    include("php/conexao2.php");
    if(isset($_POST["nome"]) || isset($_POST['senha']) || isset($_POST['email'])){
        $nome= $_POST['nome'];
        $email= $_POST['email'];
        $senha= $_POST['senha'];

        if(strlen($_POST['nome'])== 0){
            echo "<script>alert('Preencha seu Usuário');</script>";
        } else if(strlen($_POST['senha'])== 0){
            echo "<script>alert('Preencha sua Senha');</script>";
        } else if(strlen($_POST['email']) == 0) {
            echo "<script>alert('Preencha seu E-mail');</script>";
        } else {
            //Vendo se ja tem esse e-mail
            $sql_email = "SELECT * FROM login WHERE email = '$email'";
            $sql_query = $conexao->query($sql_email) or ("Falha na execução do código SQL: ".mysqli_error($mysqli));

            //Vendo se ja tem esse usuário
            $sql_user = "SELECT * FROM login WHERE nome = '$nome'";
            $sql_query2 = $conexao->query($sql_user) or ("Falha na execução do código SQL:".mysqli_error($mysqli));

            $quantidade_email = $sql_query->num_rows;
            $quantidade_nome = $sql_query2->num_rows;
            
            if($quantidade_email == 1){
                echo "<script>alert('Email já cadastrado. Tente fazer Login');</script>";
            }

            elseif($quantidade_nome ==1) {
                echo "<script>alert('Usuário já cadastrado. Tente fazer Login');</script>";
            }
            
            else{
                $sql="INSERT INTO login(nome, email, senha) VALUES ('$nome', '$email', '$senha')";

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
    <link rel="stylesheet" href="styles/style_modal.css">
    <title>Criar Conta</title>
</head>
<body>
<div id="fade" class=""></div>
    <div id="modal" class="">
        <div class="modal-header">
            <h2>Criar Conta</h2>
        </div>
        <div class="modal-body">
            <form action="" method="POST">
                <p>Digite seus dados para acessar.</p>   

                <label>Usuário</label>
                <input type="text" name="nome" placeholder="Digite seu usuário">
                
                <label>E-mail</label>
                <input type="e-mail" name="email" placeholder="Digite seu e-mail">

                <label>Senha</label>
                <input type="password" name="senha" placeholder="Digite sua senha">
                
                <a href="#">Esqueci minha senha</a>
                <input type="submit" value="Criar"/>

                <p>Já possui uma conta? <a href="index.php">Entre Agora</a> </p>
            </form>
        </div>
    </div>

</body>
</html>

