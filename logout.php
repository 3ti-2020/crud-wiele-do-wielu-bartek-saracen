<?php

    session_start();

    unset($_SESSION['zalogowany']);
    unset($_SESSION['admin']);

    header("Location: http://bartek-saracen-crud.herokuapp.com/");

?>