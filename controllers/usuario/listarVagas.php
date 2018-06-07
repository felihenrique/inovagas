<?php

if(is_post()) {
    require_once("VagaRepository.php");
    $vagaRepo = new VagaRepository();
    if($vagaRepo->listar()) {
        header('Location:/criarVaga.php');
    }
}
else {
    render_view("usuario/listarVagas.php");
}