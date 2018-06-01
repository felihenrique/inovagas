<?php
require_once('../repositories/UsuarioRepository.php');

$usuario = new UsuarioRepository();
if($usuario->logarUsuario($_POST['login'], $_POST['senha'])) {
    echo "USUARIO LOGADO";
}
else {
    echo "USUARIO OU SENHA INCORRETOS";
}