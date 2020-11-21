<?php

session_start();

require_once('connect.php');

if(isset($_SESSION['zalogowany'])&&($_SESSION['zalogowany'])==1){
    unset($_SESSION['zalogowany']);
    if(isset($_SESSION['user'])) unset($_SESSION['user']);
    if(isset($_SESSION['admin'])) unset($_SESSION['admin']);
    if(isset($_SESSION['login'])) unset($_SESSION['login']);
    if(isset($_SESSION['haslo'])) unset($_SESSION['haslo']);
    header('Location:index.php');
}
else {
    header('Location:index.php');
    exit();
}

mysqli_close($conn);
?>