<?php 
	require_once("EmpresaRepository.php");
	$empresaRepo = new EmpresaRepository();
	$aceitarempresa = $empresaRepo->aceitarEmpresa();

	render_view("usuario/aprovacaoempresa.php", [
			'aceitarempresa' => $aceitarempresa
		]);

?>