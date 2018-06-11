<?php
    require_once("VagaRepository.php");
    $vagaRepo = new VagaRepository();
    $vagas = $vagaRepo->listar();
    render_view("/vagas/listarVagas.php", [
		'vagas' => $vagas
	]);
?>