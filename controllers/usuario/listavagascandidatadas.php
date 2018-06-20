<?php
require_once('repositories/UsuarioRepository.php');
$usuarioRepo = new UsuarioRepository();

$vagas = $usuarioRepo->listaVagasCandidatadas($_SESSION['idusuario']);

render_view('usuario/listavagascandidatadas.php', [
    'vagas' => $vagas
]);