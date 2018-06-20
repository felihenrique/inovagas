<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Vaga</th>
      <th scope="col">Empresa</th>
      <th scope="col">Remuneracao</th>
      <th scope="col">Meses Duracao</th>
      <th scope="col">Selecionado</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($vagas as $vaga) { ?>
	<tr>
	  <td><?php echo $vaga['titulo'] ?></td>
      <td><?php echo $vaga['nome_fantasia'] ?></td>
      <td><?php echo $vaga['remuneracao'] ?></td>
      <td><?php echo $vaga['meses_duracao'] ?></td>
      <td><?php if($vaga['selecionado']) { echo "Sim"; } else { echo "Não"; } ?></td>
	</tr>
	<?php } ?>
  </tbody>
</table>
