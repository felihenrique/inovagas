<?php
	
	require_once("VagaRepository.php");
	$vagaRepo = new VagaRepository();
	$vagas = $vagaRepo->buscarPorId($_GET['idvaga']);
	
    if(is_post()) {
	    if($vagaRepo->alterar($_POST,$idvaga)) {
	        header('Location:/vagas/alterarVaga.php',array('vagas' => $vagas));
	    }
	}
	else {
	    render_view("/vagas/alterarVaga.php");
	}