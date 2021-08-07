<?php
    ob_start();
    session_start();

    session_destroy();

    header( 'Location: ../head office/officeLogin.php');
?>