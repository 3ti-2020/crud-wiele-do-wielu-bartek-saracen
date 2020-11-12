<?php
require_once("connect.php");
$idat = $_POST['idat'];
$ia = $_POST['ia'];
$it = $_POST['it'];
$conn->query("DELETE FROM lib_autor_tytul WHERE id_autor_tytul=$idat");
$conn->query("DELETE FROM lib_autor WHERE id_autor=$ia");
$conn->query("DELETE FROM lib_tytul WHERE id_tytul=$it");
mysqli_close($conn);
header("Location: http://bartek-saracen-crud.herokuapp.com/");
?>