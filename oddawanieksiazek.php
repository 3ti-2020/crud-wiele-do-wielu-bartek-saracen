<?php

session_start();

require_once('connect.php');

if(isset($_SESSION['zalogowany'])&&$_SESSION['zalogowany']==1){
    $id=$_POST['id_wyp'];
    $conn->query("DELETE FROM wypozyczenia WHERE id='$id'");
    // header('Location:index.php');
}
// else {
//     header('Location:index.php');
// }

header('Location:index.php');
mysqli_close($conn);
?>