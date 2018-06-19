<?php
    require_once("VagaRepository.php");
    $vagaRepo = new VagaRepository();
    
    $vagas = $vagaRepo->listar($_SESSION['idusuario']);
    render_view("/vagas/listarVagas.php", [
		'vagas' => $vagas
	]);
?>