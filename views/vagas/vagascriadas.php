<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Nome da Vaga</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($vagascriadas as $vagacriada) { ?>
		<tr>
			<td><?php echo $vagacriada['titulo'] ?></td>
		</tr>
	<?php } ?>
  </tbody>
</table>

