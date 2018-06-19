<?php 
	require_once("VagaRepository.php");
	$vagaRepo = new VagaRepository();
	$candidatura = $vagaRepo->candidatar($_GET['idvaga'], $_GET['idusuario']);
  	header('Location:/vagas/candidatura.php');

?>

