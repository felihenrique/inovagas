<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Vaga</th>
      <th scope="col">Empresa</th>
      <th scope="col">Remuneracao</th>
      <th scope="col">Meses Duracao</th>
      <th scope="col">Opções</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($vagasPublicadas as $vaga) { ?>
		<tr>
			<td><?php echo $vaga['titulo'] ?></td>
      <td><?php echo $vaga['nome_fantasia'] ?></td>
      <td><?php echo $vaga['remuneracao'] ?></td>
      <td><?php echo $vaga['meses_duracao'] ?></td>
      <td>
        <a class="btn btn-success btn-sm" href="/usuario/candidatar-se.php?idvaga=<?php echo $vaga['idvaga'] ?>&idusuario=<?php echo $_SESSION['idusuario']?>">Candidatar-se</a>
      </td>
		</tr>
	<?php } ?>
  </tbody>
</table>
