<?php
require_once(__DIR__ . '/../../repositories/AdminRepository.php');
require_once(__DIR__ . '/../../utilidades.php');

$adminRepo = new AdminRepository();
if($adminRepo->criar($_POST)) {
    header('Location:/index.php');
}