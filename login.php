<?php

session_start();
require_once("connect.php");

if ($conn->query("SELECT * FROM `lib_users` WHERE `name` = '".$_POST['login']."' AND `password` = '".$_POST['password']."'")->fetch_assoc()) $_SESSION['login'] = $_POST['login'];


header("Location: index.php");

?>