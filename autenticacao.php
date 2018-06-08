<?php
if(!$_SESSION['logged']) {
    header('Location:usuario/login.php');
}