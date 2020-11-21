<?php

session_start();

require_once('connect.php');

if(isset($_SESSION['admin'])&&$_SESSION['admin']==1){
    $idlat=$_POST['id_lat'];
    $idtyt=$_POST['id_lt'];
    $result=@$conn->query("SELECT id,id_tytul FROM lib_autor_tytul WHERE id='$idlat' AND id_tytul='$idtyt'");
    if($row=$result->fetch_assoc()){
        $conn->query("DELETE FROM lib_autor_tytul WHERE id='$idlat'");
        $conn->query("DELETE FROM lib_tytul WHERE id='$idtyt'");
        header('Location:index.php');
    }
    $result->close();
}
else {
    header('Location:index.php');
    exit();
}

mysqli_close($conn);
?>