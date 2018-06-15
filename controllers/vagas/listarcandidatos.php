<?php 
	require_once("VagaRepository.php");
	$candidatosRepo = new VagaRepository();
	$candidatos = $candidatosRepo->listarCandidatos('idvaga');
	render_view("vagas/listarcandidatos.php", [
			'candidatos' => $candidatos
		]);
?>