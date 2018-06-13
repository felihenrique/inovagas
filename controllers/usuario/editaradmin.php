<?php
require_once("AdminRepository.php");
$adminRepo = new AdminRepository();

if(is_post()) {
    if($adminRepo->editar($_POST)) {
        header('Location:/index.php');
    }
}
else {
    render_view("usuario/editaradmin.php", [
        'dados' => $adminRepo->buscarPorId($_SESSION['idusuario'])
    ]);
}