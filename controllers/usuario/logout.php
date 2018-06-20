<?php
    $_SESSION['logged'] = false;
    unset($_SESSION['idusuario']);
    unset($_SESSION['perfil']);
    header('Location: login.php');
