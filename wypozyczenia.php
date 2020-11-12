<?php
require_once("connect.php");
$imie=$_POST['imie'];
$nazwisko=$_POST['nazwisko'];
$idat=$_POST['id_autor_tytul'];
$sql="INSERT INTO `wypozyczenia`(`id_wyp`, `id_a_t`, `Imie_wyp`, `Nazwisko_wyp`, `data_wypozyczenia`, `data_oddania`) VALUES (NULL,'$idat','$imie','$nazwisko',NOW(),NOW()+INTERVAL 1 MONTH)";
$conn->query($sql);
mysqli_close($conn);
header("Location: http://bartek-saracen-crud.herokuapp.com/");
?>