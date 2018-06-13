<?php
require_once("EmpresaRepository.php");
$empresaRepo = new EmpresaRepository();

if(is_post()) {
    if($empresaRepo->editar($_POST)) {
        header('Location:/index.php');
    }
}
else {
    render_view("usuario/editarempresa.php", [
        'dados' => $empresaRepo->buscarPorId($_SESSION['idusuario'])
    ]);
}