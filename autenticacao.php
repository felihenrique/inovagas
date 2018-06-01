<?php
if(!isset($_SESSION['user_id'])) {
    header('Location:/loginform.php');
}