<?php
require_once(__DIR__ . '/../../repositories/UsuarioRepository.php');

$usuario = new UsuarioRepository();
if($usuario->logarUsuario($_POST['login'], $_POST['senha'])) {
    session_start();
    $_SESSION['logged'] = true;
    header('Location:/index.php');
}
else {
    echo "USUARIO OU SENHA INCORRETOS";
}