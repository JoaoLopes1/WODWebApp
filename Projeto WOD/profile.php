<?php
require 'php/conexao.php';
require 'protect.php';
$userID = $_SESSION['userID'];
$userNAME = $_SESSION['userNAME'];
$data = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM login WHERE userID = $userID"));

$nomeLOGADO = $_SESSION['userNAME'];
$quantidade_userNAME = 1; 
$newUsername = $_SESSION['userNAME'];

if (isset($_POST["newUsername"])) {
    $newUsername = $_POST["newUsername"];
    
    // Verifique se o campo "newUsername" está vazio
    if (!empty($newUsername)) {
        $sql_user = "SELECT * FROM login WHERE userNAME = '$newUsername'";
        $sql_query2 = $mysqli->query($sql_user) or die("Falha na execução do código SQL: " . mysqli_error($mysqli));
        $quantidade_userNAME = $sql_query2->num_rows;

        if ($quantidade_userNAME == 1) {
            // Usuário já existe, faça algo aqui
        } else {
            // Atualize o nome de usuário
            if ($mysqli->query("UPDATE login SET userNAME = '$newUsername' WHERE userNAME = '$nomeLOGADO'")) {
                //echo "Username atualizado com sucesso.";
                // Atualize a variável de sessão para refletir o novo nome de usuário, se necessário.
                $_SESSION['userNAME'] = $newUsername;
                $nomeLOGADO = $newUsername;
            } else {
                //echo "Não foi possível atualizar o Username: " . $mysqli->error;
            }
        }
    } else {
        //echo "O campo 'newUsername' está vazio. Por favor, insira um novo nome de usuário.";
    }
}

if (isset($_POST["username"])) {
    $newUsername = $_POST["username"];
    
    // Verifique se houve um erro ao executar a consulta SQL
    if ($mysqli->query("UPDATE login SET userNAME = '$newUsername' WHERE userNAME = '$nomeLOGADO'")) {
        //echo "Username atualizado com sucesso.";
    } else {
        //echo "Não foi possível atualizar o Username: " . $mysqli->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/pages.css">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Profile2</title>  
</head>
<body>
<section id="background_image" ></section>
<header class="header">
        <nav class="navbar">
            <a href="home_page.php" class="nav-logo">Home</a>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="https://whitewolf.fandom.com/wiki/World_of_Darkness" class="nav-link">Wiki</a>
                </li>
                <li class="nav-item">
                    <a href="chars.php" class="nav-link">Char's</a>
                </li>
                <li class="nav-item">
                    <a href="choricle.html" class="nav-link">Chronicles</a>
                </li>
                <li class="nav-item">
                    <a href="profile.php" class="nav-link">Profile</a>
                </li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
	</header>
    <div class= "profileElements">
        <div class="ATUALIZAR_PROFILE_NAO_MEXER">
            <form class="form" id="form" action="" enctype="multipart/form-data" method="post">
                <div class="upload">
                    <?php
                    $id = $data['userID'];
                    $name = $data['userNAME'];
                    $image = $data['userIMAGEPATH'];
                    $deletePath =  "arquivos/".$data['userIMAGEPATH'];
                    ?>
                    <div class="div_userIMAGE"><img src="arquivos/<?php echo $image; ?>" title="User Image" class ="userIMAGE"></div>
                    <div class="img_input">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="hidden" name="name" value="<?php echo $name; ?>">
                        <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png">
                        <i class="fa fa-camera" style = "color: #fff;"></i>
                    </div>
                </div>
            </form>
            <script type="text/javascript">
                document.getElementById("image").onchange = function() {
                    document.getElementById("form").submit();
                };
            </script>
            <?php
            if(isset($_FILES["image"]["name"])) {
                $id = $_POST["id"];
                $name = $_POST["name"];
                $imageName = $_FILES["image"]["name"];
                $imageSize = $_FILES["image"]["size"];
                $tmpName = $_FILES["image"]["tmp_name"];
                // Image validation
                $validImageExtension = ['jpg', 'jpeg', 'png'];
                $imageExtension = explode('.', $imageName);
                $imageExtension = strtolower(end($imageExtension));
                if (!in_array($imageExtension, $validImageExtension)){
                echo $imageExtension;
                "
                <script>
                    alert('Invalid Image Extension');
                    document.location.href = '../updateimageprofile';
                </script>
                ";
                }
                elseif ($imageSize > 1200000){
                echo
                "
                <script>
                    alert('Image Size Is Too Large');
                    document.location.href = '../updateimageprofile';
                </script>
                ";
                }
                else {
                $newImageName = uniqid();
                $newImageName .= "." . $imageExtension;
                $query = "UPDATE login SET userIMAGEPATH = '$newImageName' WHERE userID = $id";
                mysqli_query($mysqli, $query);
                move_uploaded_file($tmpName, 'arquivos/' . $newImageName);
                if (file_exists($deletePath)) {
                    if (unlink($deletePath)) {
                        //echo "Arquivo $deletePath foi excluído com sucesso.";
                    } else {
                        echo "Não foi possível excluir o arquivo $deletePath.";
                    }
                } else {
                    echo "O arquivo $deletePath não existe.";
                }
                echo
                "
                <script>
                document.location.href = 'profile.php';
                </script>
                ";
                }}
            ?>
            <div class="div_logout"><a href="logout.php" class="desconectar">Desconectar</a></div>
        </div>

        <div class="area_infos">
            <div class="user_area">
                <form class="" method="POST" action="" id="usernameFORM">
                    <label>Usuário:</label>
                    <input type="text" name="newUsername" id="newUsername" value="<?php echo $_SESSION['userNAME']?>" required>
                </form>
                <script type="text/javascript">
                    document.getElementById("newUsername").onchange = function() {
                        document.getElementById("usernameFORM").submit();
                    };
                </script>
            </div>

            <div class="char_chron">
                <div class="inner_div">
                    <p>Character's 0/10</p>
                </div>
                <div class="inner_div">
                    <p>Chronicles 0/6</p>
                </div>
            </div>

        </div>
    </div>
</body>
</html>