<?php
	require_once("VagaRepository.php");
	$vagaRepo = new VagaRepository();
	$vagasPublicadas = $vagaRepo->vagasPublicadas();
    render_view("/vagas/candidatura.php", [
		'vagasPublicadas' => $vagasPublicadas
	]);
?>
