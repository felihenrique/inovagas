<?php

if(is_post()) {
    require_once("EmpresaRepository.php");
    $empresaRepo = new EmpresaRepository();
    if($empresaRepo->criar($_POST)) {
        header('Location:/index.php');
    }
}
else {
    render_view("usuario/criarempresa.php");
}