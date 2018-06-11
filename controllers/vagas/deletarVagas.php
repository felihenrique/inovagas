<?php

	require_once("VagaRepository.php");
	$vagaRepo = new VagaRepository();
	 if (isset($_GET['idvaga']))
	{
		$vagas = $vagaRepo->deletar($idvaga);
	} else{
		echo "<script>"
            . "alert('Não foi possivel deletar!');"
            . "history.go(-1);"
            . "</script>";
	}
   
	