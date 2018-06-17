<form class="form-inline form-group" action="/vagas/buscarVaga.php" method="post">
    <div class="form-group">
        <input class="form-control" type="text" name="titulo" id="titulo" placeholder="Buscar">
        <input class="btn btn-primary" style="margin-left: 10px" type="submit" value="Buscar">
    </div>
</form>

<table class="table table-striped">
<thead>
	<tr>
	<th scope="col">Titulo</th>
	<th scope="col">Descrição</th>
	<th scope="col">Área</th>
	<th scope="col">Prazo inscrições</th>
	<th scope="col">Remuneração</th>
	<th scope="col">Carga hóraria</th>
	<th scope="col">Meses Duração</th>
	<th scope="col">Data Cadastro</th>
</tr>
</thead>
<tbody>
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
		</tr>
	<?php } ?>
</tbody>
</table>