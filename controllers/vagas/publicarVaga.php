<?php
	require_once("VagaRepository.php");
	$vagaRepo = new VagaRepository();
	if (isset($_GET['idvaga']))
	{
		$vagaRepo->publicar($_GET['idvaga']);
		header('Location:/vagas/listarVagasPublicadas.php');
	} else{
		echo "<script>"
            . "alert('Não foi possivel publicar!');"
            . "history.go(-1);"
            . "</script>";
	}
   
	