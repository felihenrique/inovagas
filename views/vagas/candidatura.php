<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Vaga</th>
      <th scope="col">Empresa</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($vagasPublicadas as $vaga) { ?>
		<tr>
			<td><?php echo $vaga['titulo'] ?></td>
      <td><?php echo $vaga['idempresa'] ?></td>
      <td>
        <a class="btn btn-success btn-sm" href="/usuario/candidatar-se.php?idvaga=<?php echo $vaga['idvaga'] ?>&idusuario=<?php echo $_SESSION['idusuario']?>">Candidatar-se</a>
      </td>
		</tr>
	<?php } ?>
  </tbody>
</table>
