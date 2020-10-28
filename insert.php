<?php
$conn=new mysqli('remotemysql.com','PDsWaSTZR9','6Xi9F82obS','PDsWaSTZR9');
$autor = $_POST['nazwisko'];
$tytul = $_POST['tytul'];
$sql1 = "INSERT INTO `lib_autor`(`id_autor`, `autor`) VALUES (NULL, '$autor')";
$sql2 = "INSERT INTO `lib_tytul`(`id_tytul`, `tytul`) VALUES (NULL, '$tytul')";
$conn->query($sql1);
$conn->query($sql2);
mysqli_close($conn);
?>