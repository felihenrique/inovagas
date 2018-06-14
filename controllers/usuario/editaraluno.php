<?php
require_once("AlunoRepository.php");
$alunoRepo = new AlunoRepository();

if(is_post()) {
    if($alunoRepo->editar($_POST)) {
        header('Location:/index.php');
    }
}
else {
    render_view("usuario/editaraluno.php", [
        'dados' => $alunoRepo->buscarPorId($_SESSION['idusuario'])
    ]);
}