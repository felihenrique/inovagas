<h4>Listagem de candidatos para a vaga '<?php echo $vaga['titulo'] ?>'</h4>
<?php if($selecao) { ?>
<form action="entrevistacandidatos.php" method="post">
<?php } ?>
<table class="table table-striped">
  <thead>
    <tr>
      <?php if($selecao) { ?> <th scope="col">#</th> <?php } ?> 
      <th scope="col">Nome</th>
      <th scope="col">Semestre inicio</th>
      <th scope="col">Ano inicio</th>
      <th scope="col">Curso</th>
      <th scope="col">Data nascimento</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($candidatos as $candidato) { ?>
		<tr>
      <td><?php if($selecao) { ?> <input type="checkbox" name="listaalunos[]" 
      value="<?php echo $candidato['idcandidatura'] ?>"> <?php } ?></td>
			<td><?php echo $candidato['nome'] ?></td>
			<td><?php echo $candidato['semestre_inicio'] ?></td>
      <td><?php echo $candidato['ano_inicio'] ?></td>
      <td><?php echo $candidato['curso'] ?></td>
      <td><?php echo $candidato['data_nascimento'] ?></td>
		</tr>
	<?php } ?>
  </tbody>
</table>


<?php if($selecao) { ?>
<h5>Marcar entrevista</h3>
<div class="form-row">
  <div class="form-group col-md-4">
    <label>Horario</label>
    <input type="text" class="form-control" name="horario" id="horario">
  </div>

  <div class="form-group col-md-4">
    <label>Data</label>
    <input type="text" class="form-control" name="data" id="data">
  </div>

  <div class="form-group col-md-4">
    <label>Local</label>
    <input type="text" class="form-control" name="local" id="local">
  </div>
</div>
<div class="form-group">
    <label>Mensagem</label>
    <textarea class="form-control" name="mensagem" id="mensagem"></textarea>
</div>

<input type="submit" class="btn btn-primary" value="Submeter">

</form>
<?php } ?>