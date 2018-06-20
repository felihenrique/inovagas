<?php echo "Olá " . $usuario['login']; ?>

<?php if ($perfil == "administrador") { ?>
		<ul>
			<li><a href="/usuario/aprovacaoempresa.php">Empresas pré cadastradas</a></li>

		</ul>
<?php } ?>

<? if ($perfil == "empresa"): ?>
		<? if (!$situacao_cadastro) : ?>
			<div class="alert alert-danger">Seu cadastro ainda não foi aprovado</div>
		<? endif; ?>
		<? if($situacao_cadastro): ?>
		<ul>
			<li><a href="/vagas/criarVaga.php">Criar vaga</a></li>
			<li><a href="/vagas/listarVagas.php">Todas as vagas</a></li>
			<li><a href="/vagas/listarVagasCanceladas.php">Vagas canceladas</a></li>
			<li><a href="/vagas/listarVagasPublicadas.php">Vagas publicadas</a></li>
		</ul>
		<? endif; ?>
<? endif; ?>

<?php if ($perfil == "aluno") { ?>
		<ul>
			<li><a href="/vagas/candidatura.php">Candidatar a vaga</a></li>
			<li><a href="/usuario/listavagascandidatadas.php">Vagas em que se candidatou</a></li>
			
		</ul>
<?php } ?>