<?php
require 'php/conexao.php';
require 'protect.php';
$userID = $_SESSION['userID'];
$userNAME = $_SESSION['userNAME'];
$data = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM login WHERE userID = $userID"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/profile2.css">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Profile2</title>  
</head>
<body>
<section id="background_image" ></section>
    <header>
		<div class="container">
			<div class="topnav">
				<a href="home_page.php">Home</a>
				<a href="https://whitewolf.fandom.com/wiki/World_of_Darkness" target="_blank">Wiki</a>
				<a href="chars.php">Char's</a>
				<a href="choricle.php">Chronicles</a>
				<a href="profile.php" >Profile</a>
			</div>
		</div>
	</header>
    <div class= "profileElements">
        <div class="ATUALIZAR_PROFILE_NAO_MEXER">
            <form class="form" id="form1" action="" enctype="multipart/form-data" method="post">
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
                    document.getElementById("form1").submit();
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
                document.location.href = 'profile2.php';
                </script>
                ";
                }}
            ?>
            <div class="div_logout"><a href="logout.php" class="desconectar">Desconectar</a></div>
        </div>

        <div class="area_infos">
            <div class="user_area">
                <form class="" method="POST" action="" id="form2">
                    <label>Usuário:</label>
                    <input type="text" name="newUsername" id="newUsername" value="<?php echo $_SESSION['userNAME']?>" required>
                    <button type="submit" name="changeUsername" class="submit button">Submit</button>
                </form>
                <script type="text/javascript">
                    document.getElementById("newUsername").onchange = function() {
                    document.getElementById("form2").submit();
                };
                </script>
                <?php 
                    $nomeLOGADO = $_SESSION['userNAME'];
                    $quantidade_userNAME = 1; 
                    
                    if (isset($_POST["newUsername"])) {
                        $newUsername = $_POST["newUsername"];
                        $sql_user = "SELECT * FROM login WHERE userNAME = '$nomeLOGADO'";
                        $sql_query = $mysqli->query($sql_user) or ("Falha na execução do código SQL:".mysqli_error($mysqli));
                        $quantidade_userNAME = $sql_query->num_rows;
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
                ?>
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