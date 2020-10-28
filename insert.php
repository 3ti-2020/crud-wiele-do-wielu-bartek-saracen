<?php
require('connect.php');
$autor = $_POST['nazwisko'];
$tytul = $_POST['tytul'];
$sql1 = "INSERT INTO `lib_autor`(`id_autor`, `autor`) VALUES (NULL, '$autor')";
$sql2 = "INSERT INTO `lib_tytul`(`id_tytul`, `tytul`) VALUES (NULL, '$tytul')";
$conn->query($sql1);
$conn->query($sql2);
mysqli_close($conn);
header('Location: http://bartek-saracen-crud.herokuapp.com/');
?>