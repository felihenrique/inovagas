<?php

	$idvaga = $_GET['idvaga'];
	require_once("VagaRepository.php");
	$vagaRepo = new VagaRepository();
	if(isset($idvaga))
	{
		$vagas = $vagaRepo->buscarPorId($idvaga);
	}
    if(is_post()) {
	    if($vagaRepo->alterar($_POST,$idvaga)) {
	        header('Location:/vagas/criarVaga.php',array('vaga' => $vaga));
	    }
	}
	else {
	    render_view("/vagas/criarVaga.php");
	}