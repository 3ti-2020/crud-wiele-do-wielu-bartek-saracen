<?php

    session_start();

    unset($_SESSION['zalogowany']);
    unset($_SESSION['admin']);
    unset($_SESSION['editor']);

    header("Location: http://bartek-saracen-crud.herokuapp.com/");

?>