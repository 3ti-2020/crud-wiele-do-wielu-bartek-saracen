<?php
require('connect.php');
$autor = $_POST['nazwisko'];
$tytul = $_POST['tytul'];
$sql1 = "INSERT INTO `lib_autor`(`id_autor`, `autor`) VALUES (NULL, '$autor')";
if ($conn->query($sql1) === TRUE) {
    $last_id1 = $conn->insert_id;
  }
$sql2 = "INSERT INTO `lib_tytul`(`id_tytul`, `tytul`) VALUES (NULL, '$tytul')";
if ($conn->query($sql2) === TRUE) {
    $last_id2 = $conn->insert_id;
  }
$sql3 = "INSERT INTO `lib_autor_tytul`(`id_autor_tytul`, `id_autor`, `id_tytul`) VALUES (NULL,$last_id1,$last_id2)";
$conn->query($sql3);
mysqli_close($conn);
header('Location: http://bartek-saracen-crud.herokuapp.com/');
?>
