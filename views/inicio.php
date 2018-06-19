<h1>INDEX</h1>
<?php echo "Olá " . $usuario['login']; ?>

<?php if ($perfil == "administrador") { ?>
		<ul>
			<li><a href="/usuario/aprovacaoempresa.php">Empresas pré cadastradas</a></li>

		</ul>
<?php } ?>

<?php if ($perfil == "empresa") { ?>
		<ul>
			<li><a href="/vagas/criarVaga.php">Criar vaga</a></li>
			<li><a href="/vagas/listarVagas.php">Todas as vagas</a></li>
			<li><a href="/vagas/listarVagas.php">Vagas canceladas</a></li>
			<li><a href="/vagas/listarVagas.php">Vagas publicadas</a></li>
			<li><a href="/vagas/listarcandidatos.php">Candidatos</a></li>
		</ul>
<?php } ?>

<?php if ($perfil == "aluno") { ?>
		<ul>
			<li><a href="/vagas/candidatura.php">Inscrições</a></li>
		</ul>
<?php } ?>

<br><a href="/usuario/logout.php">Logout</a>