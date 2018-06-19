<?php
require_once("VagaRepository.php");
$vagaRepo = new VagaRepository();
if(is_post()) {
    if($vagaRepo->cadastrarEntrevistaEmLote($_POST)) {
        header('Location:/vagas/listarVagas.php');
    }
}
else {
    header('Location:/vagas/listarVagas.php');
}