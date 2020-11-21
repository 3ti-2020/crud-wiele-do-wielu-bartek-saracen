<?php

session_start();

require_once('connect.php');

if(!isset($_SESSION['zalogowany'])){
$login=$_POST['login'];
$password=$_POST['password'];
if(isset($_POST['login'])&&isset($_POST['password'])){
    $result=$conn->query("SELECT nick,users.password,rola_id FROM users WHERE nick='$login' AND users.password='$password'");
    if($row=$result->fetch_assoc()){
        if(isset($_SESSION['bladlogowania'])) unset($_SESSION['bladlogowania']);
        if(($_POST['login']==$row['nick'])&&($_POST['password']==$row['password'])&&($row['rola_id']==1)){
            $_SESSION['zalogowany']=1;
            $_SESSION['admin']=1;
            $_SESSION['login']=$login;
            $_SESSION['haslo']=$password;
            // header('Location:index.php');
        }
        else if(($_POST['login']==$row['nick'])&&($_POST['password']==$row['password'])&&($row['rola_id']==2)){
            $_SESSION['zalogowany']=1;
            $_SESSION['user']=1;
            $_SESSION['login']="$login";
            $_SESSION['haslo']="$password";
            // header('Location:index.php');
        }
        header('Location:index.php');
        $result->close();
    }
    else {
        if(isset($_SESSION['bladlogowania'])){
            // header('Location:index.php');
        }
        else if(!isset($_SESSION['bladlogowania'])){
        $_SESSION['bladlogowania']="<span style='color:red'>bląd logowania</span>";
        // header('Location:index.php');
    }
    header('Location:index.php');
    }
}
}
else {
    header('Location:index.php');
    exit();
}
mysqli_close($conn);
?>