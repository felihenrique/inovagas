<?php
    require_once("autenticacao.php");
    render_view("inicio.php");
    require_once('UsuarioRepository.php');
    $userRepo = new UsuarioRepository();
    $usuario = $userRepo->buscarPorId($_SESSION['idusuario']);
    echo "Olá " . $usuario[0]['login'];
?>

