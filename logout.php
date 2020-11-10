<?php

    session_start();

    unset($_SESSION['login']);

    header("Location: http://bartek-saracen-crud.herokuapp.com/");

?>