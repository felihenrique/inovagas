<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th></th>
      <th scope="col">Seleção</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($candidatos as $candidato) { ?>
		<tr>
			<td><?php echo $candidato['nome'] ?></td>
			<td><?php echo $candidato['cpf'] ?></td>
			<td>
      <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#detalhes<?php echo $candidato['idusuario'] ?>">
        Detalhes
      </button>
      </td>
			<td>
			 <a class="btn btn-success btn-sm" href="atualizarstatus.php?novo_status=1&idusuario=<?php echo $candidato['idusuario']?>">Aprovar</a>
       <a class="btn btn-danger btn-sm" href="atualizarstatus.php?novo_status=0&idusuario=<?php echo $candidato['idusuario']?>">Recusar</a>
			</td>
		</tr>
	<?php } ?>
  </tbody>
</table>

