<?php

if(is_post()) {
    require_once("AlunoRepository.php");
    $alunoRepo = new AlunoRepository();
    if($alunoRepo->criar($_POST)) {
        header('Location:/index.php');
    }
}
else {
    render_view("usuario/criaraluno.php");
}