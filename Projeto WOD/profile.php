<?php
include('protect.php');
include('php/conexao.php');
$nomeLOGADO = $_SESSION['userNAME'];
$quantidade_userNAME = 1; 
$newUsername = $_SESSION['userNAME'];

if (isset($_POST["newUsername"])) {
    $newUsername = $_POST["newUsername"];
    

        $sql_user = "SELECT * FROM login WHERE userNAME = '$newUsername'";
        $sql_query2 = $mysqli->query($sql_user) or ("Falha na execução do código SQL:".mysqli_error($mysqli));
        $quantidade_userNAME = $sql_query2->num_rows;
    }

    if($quantidade_userNAME ==1) {
    }
    
    else{
        // Verifique se houve um erro ao executar a consulta SQL
        if ($mysqli->query("UPDATE login SET userNAME = '$newUsername' WHERE userNAME = '$nomeLOGADO'")) {
            echo "Username atualizado com sucesso.";
            // Atualize a variável de sessão para refletir o novo nome de usuário, se necessário.
            $_SESSION['userNAME'] = $newUsername;
            $nomeLOGADO = $newUsername;
        } else {
            echo "Não foi possível atualizar o Username: " . $mysqli->error;
        }
    }

// Construa a consulta SQL para selecionar a coluna 'path' onde o 'Name' corresponde ao valor na sessão.
$query = "SELECT userIMAGEPATH FROM login WHERE userNAME = '$nomeLOGADO'";
$result = $mysqli->query($query);

if ($result) {
    // Verifique se a consulta retornou algum resultado.
    if ($result->num_rows > 0) {
        // Recupere os dados do resultado da consulta.
        $row = $result->fetch_assoc();
        $deletePath = $row['userIMAGEPATH'];
        //echo "O valor da coluna 'userIMAGEPATH' para $nomeLOGADO é: $deletePath";
    } else {
        echo "Nenhum registro encontrado para $nomeLOGADO";
    }
    
    // Libere o resultado da consulta.
    $result->free();
} else {
    echo "Erro na consulta: " . $mysqli->error;
}

if(isset($_FILES['arquivo'])) {
    $arquivo = $_FILES['arquivo'];

    if($arquivo['error'])
        die("Falha ao enviar arquivo. (1)");

    if($arquivo['size'] > 2097152)
        die("Arquivo muito grande! Max: 2MB");

    $pasta = "arquivos/";
    $nomeDoArquivo = $arquivo["name"];
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));


    if($extensao != "jpg" && $extensao != 'png' && $extensao != 'jpeg')
        die("Tipo de atquivo não aceito");

    $path =  $pasta . $novoNomeDoArquivo . "." . $extensao;

    $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);
    if($deu_certo){
        //Para apagar o arquivo antigo com base na funcao de cima
        if (file_exists($deletePath)) {
            if (unlink($deletePath)) {
                //echo "Arquivo $deletePath foi excluído com sucesso.";
            } else {
                echo "Não foi possível excluir o arquivo $deletePath.";
            }
        } else {
            echo "O arquivo $deletePath não existe.";
        }

        $mysqli->query("UPDATE login SET userIMAGEPATH = '$path' WHERE userNAME = '$nomeLOGADO' ") or die($mysqli->error);
        echo"<p>Arquivo enviado com sucesso! Para acessá-lo, <a target='_blank' href='arquivos/$novoNomeDoArquivo.$extensao'>Clique Aqui</a></p>";
    
    } else{
        echo "Falha ao enviar arquivo. (2)";
    }
    
}
//isso é para verificar a imagem sempre, está por último pq sempre vai pegar o mais atual possível.
$funil = "SELECT userIMAGEPATH FROM login WHERE userNAME = '$nomeLOGADO'";
$funilResult = $mysqli->query($funil);

if($funilResult) {
        // Verifique se a consulta retornou algum resultado.
        if ($funilResult->num_rows > 0) {
            // Recupere os dados do resultado da consulta.
            $row = $funilResult->fetch_assoc();
            $pathAtual = $row['userIMAGEPATH'];
            //echo "O valor da coluna 'userIMAGEPATH' para $nomeLOGADO é: $pathAtual";
        } else {
            echo "Nenhum registro encontrado para $nomeLOGADO";
        }
        
        // Libere o resultado da consulta.
        $funilResult->free();
    } else {
        echo "Erro na consulta: " . $mysqli->error;

}
if (isset($_POST["username"])) {
    $newUsername = $_POST["username"];
    
    // Verifique se houve um erro ao executar a consulta SQL
    if ($mysqli->query("UPDATE login SET userNAME = '$newUsername' WHERE userNAME = '$nomeLOGADO'")) {
        echo "Username atualizado com sucesso.";
    } else {
        echo "Não foi possível atualizar o Username: " . $mysqli->error;
    }
}

mysqli_close($mysqli);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/profile.css">
    <link rel="stylesheet" href="assets/css/reset.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Profile </title>

</head>
<body>
    
    <p>Bem Vindo, <?php echo $_SESSION['userNAME']; ?></p>
    <div class= "profileElements"><p>Imagem de Perfil:</p><img src="<?php echo $pathAtual?>" alt="" class="userProfileImage">
        <form method="POST" enctype="multipart/form-data" action="">
            <p><label>Mudar Imagem: </label>
                <input name="arquivo" type="file" id="inputArquivo"></p>
            <button type="submit">Salvar</button>
        </form>
        <form method="POST" action="">
        <label for="newUsername">Mudar Usuário:</label>
        <input type="text" name="newUsername" id="newUsername" value="<?php echo $_SESSION['userNAME']?>" required>
        <button type="submit" name="changeUsername">Mudar Usuário</button>
</form>

    </div>

    <p><a href="logout.php">Desconectar</a></p>

    <script src="assets/js/home_page.js"></script>
</body>
</html>