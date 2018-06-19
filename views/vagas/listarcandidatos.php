<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">CPF</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($candidatos as $candidato) { ?>
		<tr>
			<td><?php echo $candidato['nome'] ?></td>
			<td><?php echo $candidato['cpf'] ?></td>
		</tr>
	<?php } ?>
  </tbody>
</table>
