<?php 
	require_once("EmpresaRepository.php");
	$empresaRepo = new EmpresaRepository();
	$empresas = $empresaRepo->listarPreCadastradas();

	render_view("usuario/aprovacaoempresa.php", [
			'empresas' => $empresas
		]);

?>