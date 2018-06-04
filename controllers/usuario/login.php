<?php

if(is_post()) {
    require_once("repositories/UsuarioRepository.php");
    $usuario = new UsuarioRepository();
    if($usuario->logarUsuario($_POST['login'], $_POST['senha'])) {
        session_start();
        $_SESSION['logged'] = true;
        header('Location:/index.php');
    }
    else {
        echo "USUARIO OU SENHA INCORRETOS";
    }
}
else {
    render_view("usuario/loginform.php");
}