<?php
    session_start();

    require_once("connect.php");

    $result=$conn->query("SELECT * FROM `lib_users`");

    if ( isset($_POST['log']) && isset($_POST['pass'])){
    while($row=$result->fetch_assoc()){
    if( $row['login']==$_POST['log'] && $row['password']==$_POST['pass'] && $row['role_id']==1) {
        $_SESSION['zalogowany'] = 1;
        $_SESSION['admin'] = 1;
    }
    else if( $row['login']==$_POST['log'] && $row['password']==$_POST['pass'] && $row['role_id']==3) {
        $_SESSION['zalogowany'] = 1;
        $_SESSION['editor'] = 1;
    }
    else if($row['login']==$_POST['log'] && $row['password']==$_POST['pass'] && $row['role_id']==2){
        $_SESSION['zalogowany'] = 1;
    }
    }
    }
    header("Location: http://bartek-saracen-crud.herokuapp.com/");
?>