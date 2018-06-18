<?php
if(is_post()) {
    require_once("VagaRepository.php");
    $vagaRepo = new VagaRepository();
    if($vagaRepo->criar($_POST, $_SESSION['idusuario'])) {
        header('Location:/vagas/criarVaga.php');
       
    }
}
else {
    render_view("/vagas/criarVaga.php");
}