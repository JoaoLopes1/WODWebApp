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
                
                }

                else{
                    echo"Erro:";

                }
                header("Location: index.php");
            }

    }
}     
mysqli_close($conexao);
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
            <h2>Crie sua Conta</h2>
        </div>
        <div class="modal-body">
            <form action="" method="POST" id="form"> 
                <label>Usuário</label>
                <input type="text" name="userNAME" placeholder="Digite seu usuário" required>
                
                <label>E-mail</label>
                <input type="email" name="userMAIL" placeholder="Digite seu e-mail" id="verify_email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}" required>

                <label>Senha</label>
                <input type="password" name="userPASSW" placeholder="Digite sua senha" required>
                
                <!-- <a href="#">Esqueci minha senha</a> -->
                <input type="submit" value="Criar" class= "submit_button"/>

                <p>Já possui uma conta? <a href="index.php">Entre Agora</a> </p>
            </form>
        </div>
    </div>
    <script>
        const images = [
            'url("assets/img/bgVamp.jpg")',
            'url("assets/img/bgMage.jpg")',
            'url("assets/img/bgWere.jpg")',
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
    <script src="assets/js/login.js"></script>
</body>
</html>

