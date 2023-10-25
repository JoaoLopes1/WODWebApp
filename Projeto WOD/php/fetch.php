<?php 

if(isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

}else if (isset($_COOKIE['email']) || isset($_COOKIE['password'])) {
    $email = $_COOKIE['email'];
}

$query = "SELECT * FROM login WHERE userMAIL = '$email'";
$res = mysqli_query($conn, $query);
while($fetch = mysqli_fetch_assoc($res)) {
    $userNAME = $fetch['userNAME'];
    $userMAIL = $fetch['userMAIL'];
    $userPASSW = $fetch['userPASSW'];
    $userIMAGEPATH = $fetch['userIMAGEPATH'];

}




?>