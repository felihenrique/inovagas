<?php
    require_once("VagaRepository.php");
    $vagaRepo = new VagaRepository();
	$vagas = $vagaRepo->listarEmSelecao($_SESSION['idusuario']);
    render_view("/vagas/listarVagasEmSelecao.php", [
		'vagas' => $vagas
	]);
?>