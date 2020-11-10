<?php
    session_start();

    $conn=new mysqli('remotemysql.com','j9t0rQSoKi','way44Ystk7','j9t0rQSoKi');

    $result=$conn->query("SELECT * FROM lib_users");

    if ( isset($_POST['log']) && isset($_POST['pass'])){
    while($row=$result->fetch_assoc()){
    if ( $row['login']==$_POST['log'] && $row['password']==$_POST['pass'] && ($row['admin'] == 1)){
        $_SESSION['zalogowany'] = 1;
        $_SESSION['admin'] = 1;
    }
    }
    }
    header("Location: http://bartek-saracen-crud.herokuapp.com/");
?>