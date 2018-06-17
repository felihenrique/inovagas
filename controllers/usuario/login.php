<?php

if(is_post()) {
    require_once("UsuarioRepository.php");
    $usuarioRepo = new UsuarioRepository();
    $usuario = $usuarioRepo->logar($_POST['login'], $_POST['senha']);
    if($usuario) {
        $_SESSION['logged'] = true;
        $_SESSION['idusuario'] = $usuario[0]['idusuario'];
        header('Location:/index.php');
    }
    else {
        header('Location:login.php?loginfailed=1');
    }
}
else {
    render_view("usuario/loginform.php", [
        'login_failed' => isset($_GET['loginfailed'])
    ]);
}