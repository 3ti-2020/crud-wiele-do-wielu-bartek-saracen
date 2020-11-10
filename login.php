<?php
    session_start();
    require_once("connect.php");
    $result = $conn->query("SELECT * FROM lib_user");

    if(isset($_POST['password']) && isset($_POST['login'])){
        while($row = $result->fetch_assoc()){
            if($row['login']==$_POST['login'] && $row['password']==$_POST['password'] && $row['admin'] == 1){
                $_SESSION['zalogowany'] = 1;
                $_SESSION['admin'] = 1;
            }else if($row['login']==$_POST['login'] && $row['password']==$_POST['password']){
                $_SESSION['zalogowany'] = 1;
            }
        }
    }
    if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == 1){
        header("Location: index.html");
    }
?>