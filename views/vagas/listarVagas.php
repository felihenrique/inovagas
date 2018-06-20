<table class="table table-striped">
<h5 class="card-title">Vagas TODAS MINHAS VAGAS</h5>
<tr>
	<th scope="col">Titulo</th>
	<th scope="col">Descrição</th>
	<th scope="col">Área</th>
	<th scope="col">Prazo inscrições</th>
	<th scope="col">Remuneração</th>
	<th scope="col">Carga hóraria</th>
	<th scope="col">Meses Duração</th>
	<th scope="col">Status</th>
	<th scope="col">Data de atualização</th>
	<th scope="col">Opções</th>
</tr>
	<?php foreach ($vagas as $vaga) { ?>
		<tr>
			<td><?php echo $vaga['titulo'] ?></td>
			<td><?php echo $vaga['descricao'] ?></td>
			<td><?php echo $vaga['area'] ?></td>
			<td><?php echo $vaga['prazo_inscricoes'] ?></td>
			<td><?php echo $vaga['remuneracao'] ?></td>
			<td><?php echo $vaga['carga_horaria'] ?></td>
			<td><?php echo $vaga['meses_duracao'] ?></td>
			<td><?php echo $vaga['status'] ?></td>
			<td><?php echo $vaga['data'] ?></td>
			<td>
				<a href="editarVagas.php?idvaga=<?php echo $vaga['idvaga'];?>">Alterar</a>
				<a href="deletarVagas.php?idvaga=<?php echo $vaga['idvaga'];?>">Deletar</a>
				<a href="cancelarVaga.php?idvaga=<?php echo $vaga['idvaga'];?>">Cancelar</a>
				<?php if($vaga['status'] == "Criada") : ?>
				<a href="publicarVaga.php?idvaga=<?php echo $vaga['idvaga'];?>">Publicar</a>
				<? endif; ?>
			</td>
		</tr>
	<?php } ?>
</table>