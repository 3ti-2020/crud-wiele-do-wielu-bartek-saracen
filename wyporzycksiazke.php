<?php

session_start();

require_once('connect.php');

if(isset($_SESSION['zalogowany'])&&$_SESSION['zalogowany']==1){
    $iduser=$_POST['iduser'];
    $idksiazka=$_POST['idksiazka'];
    $dataoddania=$_POST['data_oddania'];
    $conn->query("INSERT INTO wypozyczenia VALUE(NULL,$iduser,$idksiazka,NOW(),'$dataoddania')");
    header('Location:index.php');
}
else {
    header('Location:index.php');
    exit();
}

?>