<?php
require_once("VagaRepository.php");
$vagaRepo = new VagaRepository();
$vagaRepo->finalizarVaga($_GET['idvaga']);
header('Location:/vagas/listarVagas.php');