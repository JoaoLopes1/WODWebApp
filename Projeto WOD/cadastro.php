<?php
    include("php/conexao2.php");

    $nome=$_POST['nome'];
    $email=$_POST['email'];
    $senha=$_POST['senha'];

    //Vendo se ja tem esse e-mail
    $sql_email = "SELECT * FROM login WHERE email = '$email'";
    $sql_query = $conexao->query($sql_email) or die("Falha na execução do código SQL: ".mysqli_error($mysqli));

    //Vendo se ja tem esse usuário
    $sql_user = "SELECT * FROM login WHERE nome = '$nome'";
    $sql_query2 = $conexao->query($sql_user) or die("Falha na execução do código SQL:".mysqli_error($mysqli));

    $quantidade_email = $sql_query->num_rows;
    $quantidade_nome = $sql_query2->num_rows;
    
    if($quantidade_email == 1){
        die("Email já cadastrado. Tente <a href='criar_conta'>Criar Conta</a> novamente");
    }

    elseif($quantidade_nome ==1) {
        die("Usuário já cadastrado. Tente <a href='criar_conta'>Criar Conta</a> novamente");

    }
    
    else{
        $sql="INSERT INTO login(nome, email, senha) VALUES ('$nome', '$email', '$senha')";

        if(mysqli_query($conexao, $sql)) {
        echo "Usuário cadastrado com sucesso!";
        header("Location: login.php");
        }

        else{
            echo"Erro:";

        }
        mysqli_close($conexao);
    }

    
?>
