<?php

session_start();

require_once('connect.php');

if(isset($_SESSION['zalogowany'])&&($_SESSION['zalogowany'])==1){
    unset($_SESSION['zalogowany']);
    unset($_SESSION['user']);
    unset($_SESSION['admin']);
    unset($_SESSION['login']);
    unset($_SESSION['haslo']);
    header('Location:index.php');
}
else {
    header('Location:index.php');
    exit();
}

mysqli_close($conn);
?>