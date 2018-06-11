<table>
<tr>
	<th>Titulo</th>
	<th>Descrição</th>
	<th>Área</th>
	<th>Prazo inscrições</th>
	<th>Remuneração</th>
	<th>Carga hóraria</th>
	<th>Meses Duração</th>
	<th>Data Cadastro</th>
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
		<td><?php echo $vaga['data_cadastro'] ?></td>
		<td>
			<a href="editarVagas.php?idvaga=<?php echo $vaga['idvaga']; ?>">Alterar</a> 
		 	<a href="deletarVagas.php?idvaga=<?php echo $vaga['idvaga']; ?>" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>
		</td>
	</tr>
<?php } ?>
</table>