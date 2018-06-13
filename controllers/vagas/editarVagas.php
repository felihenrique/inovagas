<?php
	require_once("VagaRepository.php");
	$vagaRepo = new VagaRepository();
    if(is_post()) {
	    if($vagaRepo->alterar($_POST)) {
	        header('Location:/vagas/listarVagas.php');
	    }
	}
	else {
		$vagas = $vagaRepo->buscarPorId($_GET['idvaga']);
	    render_view("/vagas/alterarVaga.php");
	}