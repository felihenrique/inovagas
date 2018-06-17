<?php 
	require_once("VagaRepository.php");
	$vagasRepo = new VagaRepository();
	$vagascriadas = $vagasRepo->vagasCriadas();
	render_view("vagas/vagascriadas.php", [
			'vagascriadas' => $vagascriadas
		]);
?>