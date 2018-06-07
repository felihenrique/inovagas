<?php
    unset($_SESSION['logged']);
    unset($_SESSION['idusuario']);
    header('Location: login.php');
