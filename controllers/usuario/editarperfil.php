<?php
require_once('repositories/UsuarioRepository.php');
$usuarioRepo = new UsuarioRepository();

$perfil = $usuarioRepo->getPerfil($_SESSION['idusuario']);
switch($perfil) {
    case "administrador":
        require_once('controllers/usuario/editaradmin.php');
        break;
    case "empresa":
        require_once('controllers/usuario/editarempresa.php');
        break;
    default:
        require_once('controllers/usuario/editaraluno.php');
}