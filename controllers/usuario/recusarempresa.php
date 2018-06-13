<?php 
	require_once("EmpresaRepository.php");
	$empresaRepo = new EmpresaRepository();
	$recusarempresa = $empresaRepo->recusarEmpresa();


	render_view("usuario/aprovacaoempresa.php", [
			'recusarempresa' => $recusarempresa
		]);

?>