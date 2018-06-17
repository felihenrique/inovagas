<?php

if(is_post()) {
    require_once("AdminRepository.php");
    $adminRepo = new AdminRepository();
    if($adminRepo->criar($_POST)) {
        header('Location:/index.php');
    }
}
else {
    render_view("usuario/criaradmin.php");
}