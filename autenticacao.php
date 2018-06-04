<?php
if(!isset($_SESSION['logged'])) {
    header('Location:usuario/login.php');
}