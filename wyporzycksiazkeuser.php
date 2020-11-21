<?php

session_start();

require_once('connect.php');

if(isset($_SESSION['zalogowany'])&&$_SESSION['zalogowany']==1){
    $login=$_SESSION['login'];
    $password=$_SESSION['haslo'];
    $sql="SELECT id FROM users WHERE nick='$login' and password='$password'";
    $result=$conn->query($sql);
        while($row=$result->fetch_assoc()){
            $iduser= $row['id'];
        }
    $idksiazka=$_POST['idksiazka'];
    $dataoddania=$_POST['data_oddania'];
    $conn->query("INSERT INTO wypozyczenia VALUE(NULL,$iduser,$idksiazka,NOW(),'$dataoddania')");
    header('Location:index.php');
}
else {
    header('Location:index.php');
    exit();
}

mysqli_close($conn);
?>