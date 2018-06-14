<?php 
	require_once("EmpresaRepository.php");
	$empresaRepo = new EmpresaRepository();
	$empresas = $empresaRepo->atualizarStatus($_GET['idusuario'], $_GET['novo_status']);
	header('Location:/usuario/aprovacaoempresa.php');

?>