<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">E-mail</th>
      <th></th>
      <th scope="col">Aprovação</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($empresas as $empresa) { ?>
		<tr>
			<td><?php echo $empresa['nome_fantasia'] ?></td>
			<td><?php echo $empresa['email'] ?></td>
			<td><button type="button" class="btn btn-secondary btn-sm">Detalhes</button></td>
			<td>
			<button type="button" class="btn btn-success btn-sm">Aprovar</button>
			<button type="button" class="btn btn-danger btn-sm">Recusar</button>
			</td>
		</tr>
	<?php } ?>
  </tbody>
</table>