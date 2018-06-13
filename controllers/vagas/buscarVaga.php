<?php
	require_once("VagaRepository.php");
	$vagaRepo = new VagaRepository();	
	render_view("/vagas/resultadoVagas.php", ['listaVagas' => $vagaRepo->buscarPorId($_GET['idvaga'])]);