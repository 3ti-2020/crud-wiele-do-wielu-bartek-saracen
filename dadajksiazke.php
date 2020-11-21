<?php

session_start();

require_once("connect.php");

if(isset($_SESSION['admin'])&&$_SESSION['admin']==1){
    $imieautor=$_POST['imieautora'];
    $nazwiskoautor=$_POST['nazwiskoautora'];
    $tytul=$_POST['tytul'];
    $result=@$conn->query("SELECT la.id as id_autor,lt.id as id_tytul,imie_autor,nazwisko_autor,tytul FROM lib_autor la,lib_tytul lt WHERE imie_autor='$imieautor' AND nazwisko_autor='$nazwiskoautor' AND tytul='$tytul'");
    $result1=@$conn->query("SELECT la.id as id_autor,lt.id as id_tytul,imie_autor,nazwisko_autor,tytul FROM lib_autor la,lib_tytul lt WHERE imie_autor='$imieautor' AND nazwisko_autor='$nazwiskoautor'");
    if($row=$result->fetch_assoc()){
        if(($_POST['imieautora']==$row['imie_autor'])&&($_POST['nazwiskoautora']==$row['nazwisko_autor'])&&($_POST['tytul']==$row['tytul'])){
            if(isset($_SESSION['autortytul'])) header('Location:index.php');
            else if(!isset($_SESSION['autortytul'])){
                $_SESSION['autortytul']="<span style='color:red; background:black;'>takie rekordy już istnieją</span>";
                header('Location:index.php');
            }
        }
        $result->close();
    }
    else if($row=$result1->fetch_assoc()){
        if(($_POST['imieautora']==$row['imie_autor'])&&($_POST['nazwiskoautora']==$row['nazwisko_autor'])){
            $sql="INSERT INTO `lib_tytul` VALUES (NULL,'$tytul')";
            if ($conn->query($sql) === TRUE) {
                $last_id1 = $conn->insert_id;
              }
            $sql1="(SELECT id FROM lib_autor WHERE imie_autor='$imieautor' AND nazwisko_autor='$nazwiskoautor')";
            $conn->query("INSERT INTO lib_autor_tytul VALUES(NULL,$sql1,$last_id1)");
            header('Location:index.php');
        }
        $result1->close();
    }
    else {
        $sql1="INSERT INTO lib_autor VALUES(NULL,'$imieautor','$nazwiskoautor')";
        if ($conn->query($sql1) === TRUE) {
            $last_id1 = $conn->insert_id;
        }
        $sql2="INSERT INTO lib_tytul VALUES(NULL,'$tytul')";
        if ($conn->query($sql2) === TRUE) {
            $last_id2 = $conn->insert_id;
          }
        $conn->query("INSERT INTO lib_autor_tytul VALUES(NULL,$last_id1,$last_id2)");
        header('Location:index.php');
    }
}
else {
    header('Location:index.php');
    exit();
}
mysqli_close($conn);
?>