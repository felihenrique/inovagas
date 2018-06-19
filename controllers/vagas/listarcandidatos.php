<?php
    require_once("VagaRepository.php");
    $vagaRepo = new VagaRepository();
    $candidatos = $vagaRepo->listarCandidatos($_GET['idvaga']);
    render_view("/vagas/listarcandidatos.php", [
    'candidatos' => $candidatos, 
    'vaga' => $vagaRepo->buscarPorId($_GET['idvaga']),
    'selecao' => isset($_GET['selecao'])
	]);
?>