<?php
    require_once("autenticacao.php");
    require_once('UsuarioRepository.php');
    $userRepo = new UsuarioRepository();
	if(isset($_SESSION['idusuario'])) {
		$usuario = $userRepo->buscarPorId($_SESSION['idusuario']);
		$perfil = $userRepo->getPerfil($_SESSION['idusuario']);
	}

    render_view("inicio.php", [
        'usuario' => $usuario ? $usuario : null,
        'perfil' => $perfil
    ]);
?>