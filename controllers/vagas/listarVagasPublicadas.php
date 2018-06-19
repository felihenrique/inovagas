<?php
    require_once("VagaRepository.php");
    $vagaRepo = new VagaRepository();
	$vagas = $vagaRepo->listarPublicadas($_SESSION['idusuario']);
    render_view("/vagas/listarVagasPublicadas.php", [
		'vagas' => $vagas
	]);
?>