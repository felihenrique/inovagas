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
			<li><a href="">Editar vaga</a></li>
			<li><a href="/vagas/vagascriadas.php">Vagas criadas</a></li>
			<li><a href="">Candidatos</a></li>
		</ul>
<?php } ?>

<?php if ($perfil == "aluno") { ?>
		<ul>
			<li><a href="">Inscrições</a></li>
		</ul>
<?php } ?>

<br><a href="/usuario/logout.php">Logout</a>