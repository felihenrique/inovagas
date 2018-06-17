<?php
    $_SESSION['logged'] = false;
    unset($_SESSION['idusuario']);
    header('Location: login.php');
