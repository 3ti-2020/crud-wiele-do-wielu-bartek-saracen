<?php
require_once("connect.php");
$id=$_POST['id_wyp'];
$sql = "DELETE FROM `wypozyczenia` WHERE `id_wyp`='$id'";
$conn->query($sql);
mysqli_close($conn);
//header('Location: http://bartek-saracen-crud.herokuapp.com/');
?>