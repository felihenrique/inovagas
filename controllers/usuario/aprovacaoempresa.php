<?php 
	require_once("EmpresaRepository.php");
	$empresaRepo = new EmpresaRepository();
	$empresaRepo->listarPreCadastradas();

	render_view("usuario/aprovacaoempresa.php");

?>