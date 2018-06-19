<?php
    require_once("VagaRepository.php");
    $vagaRepo = new VagaRepository();
    $candidatos = $vagaRepo->listarCandidatos();
    render_view("/vagas/listarcandidatos.php", [
		'candidatos' => $candidatos
	]);
?>