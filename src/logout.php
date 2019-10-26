<?php
    include_once('php/config.php');
    session_destroy();
    header("Location: login.php");
?>