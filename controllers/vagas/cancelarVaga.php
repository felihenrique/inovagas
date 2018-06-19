<?php
	require_once("VagaRepository.php");
	$vagaRepo = new VagaRepository();
	if (isset($_GET['idvaga']))
	{
		$vagaRepo->cancelar($_GET['idvaga']);
		header('Location:/vagas/listarVagas.php');
	} else{
		echo "<script>"
            . "alert('Não foi possivel deletar!');"
            . "history.go(-1);"
            . "</script>";
	}
   
	