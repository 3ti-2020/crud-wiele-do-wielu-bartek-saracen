<?php

session_start();

require_once('connect.php');


if(isset($_SESSION['admin'])&&$_SESSION['admin']==1){
    $nazwauzy=$_POST['nazwauzy'];
    $imieuzy=$_POST['imieuzy'];
    $nazwiskouzy=$_POST['nazwiskouzy'];
    $haslouzy=$_POST['haslouzy'];
    $result=$conn->query("SELECT nick FROM users WHERE nick='$nazwauzy'");
    if($row=$result->fetch_assoc()){
        if($_POST['nazwauzy']==$row['nick']) {
            if(isset($_SESSION['bladuzytkownik'])){
                header('Location:index.php');
            }
            else if(!isset($_SESSION['blad'])) {
                $_SESSION['bladuzytkownik']="<span style='color:red; background:black;'>nazwa zajęta</span>";
                header('Location:index.php');
            }
        }
        $result->close();
    }
    else {
        $sql="INSERT INTO `users`(`id`, `nick`, `imie`, `nazwisko`, `password`, `rola_id`) VALUES (NULL,'$nazwauzy','$imieuzy','$nazwiskouzy','$haslouzy',2)";
        $conn->query($sql);
        header('Location:index.php');
    }
}
else {
    header('Location:index.php');
    exit();
}
mysqli_close($conn);
?>