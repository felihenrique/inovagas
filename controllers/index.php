<?php
    require_once("autenticacao.php");
    require_once('UsuarioRepository.php');
    $userRepo = new UsuarioRepository();
	if(isset($_SESSION['idusuario'])) {
		$usuario = $userRepo->buscarPorId($_SESSION['idusuario']);
		$perfil = $userRepo->getPerfil($_SESSION['idusuario']);
    }
    
    $dados = [
        'usuario' => $usuario ? $usuario : null,
        'perfil' => $perfil,
    ];

    if($perfil == "empresa") {
        require_once('EmpresaRepository.php');
        $empresaRepo = new EmpresaRepository();
        $dados['situacao_cadastro'] = $empresaRepo->verificarSituacaoCadastro($_SESSION['idusuario']);
    }

    render_view("inicio.php", $dados);
?>
