<?php

if(is_post()) {
    require_once("VagaRepository.php");
    $vagaRepo = new VagaRepository();
    if($vagaRepo->criar($_POST)) {
        header('Location:/criarVaga.php');
    }
}
else {
    render_view("usuario/criarVaga.php");
}