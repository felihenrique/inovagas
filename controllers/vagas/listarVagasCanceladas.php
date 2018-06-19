<?php
    require_once("VagaRepository.php");
    $vagaRepo = new VagaRepository();
	$vagas = $vagaRepo->listarCanceladas($_SESSION['idusuario']);
    render_view("/vagas/listarVagasCanceladas.php", [
		'vagas' => $vagas
	]);
?>