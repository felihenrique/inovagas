<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">CNPJ</th>
      <th></th>
      <th scope="col">Aprovação</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($empresas as $empresa) { ?>
		<tr>
			<td><?php echo $empresa['nome_fantasia'] ?></td>
			<td><?php echo $empresa['cnpj'] ?></td>
			<td>
      <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#detalhes<?php echo $empresa['idusuario'] ?>">
        Detalhes
      </button>
      </td>
			<td>
			 <a class="btn btn-success btn-sm" href="atualizarstatus.php?novo_status=1&idusuario=<?php echo $empresa['idusuario']?>">Aprovar</a>
       <a class="btn btn-danger btn-sm" href="atualizarstatus.php?novo_status=0&idusuario=<?php echo $empresa['idusuario']?>">Recusar</a>
			</td>
		</tr>
	<?php } ?>
  </tbody>
</table>


<!-- Mostrar detalhes -->
<?php foreach ($empresas as $empresa) { ?>

<!-- Modal -->
<div class="modal fade" id="detalhes<?php echo $empresa['idusuario'] ?>" tabindex="-1" role="dialog" aria-labelledby="detalhesLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detalhesLabel">Detalhes da Empresa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
          <label><strong>Nome Fantasia:</strong></label>
          <?php echo $empresa['nome_fantasia'] ?><br>
          <label><strong>CNPJ: </strong></label>
          <?php echo $empresa['cnpj'] ?><br>
          <label><strong>Razão Social: </strong></label>
          <?php echo $empresa['razao_social'] ?><br>
          <label><strong>Área: </strong></label>
          <?php echo $empresa['area'] ?><br>

          <label><strong>E-mail: </strong></label>
          <?php echo $empresa['email'] ?><br>
          <label><strong>Rua: </strong></label>
          <?php echo $empresa['rua'] ?><br>
          <label><strong>Bairro: </strong></label>
          <?php echo $empresa['bairro'] ?><br>
          <label><strong>Cidade: </strong></label>
          <?php echo $empresa['cidade'] ?><br>
          <label><strong>Estado: </strong></label>
          <?php echo $empresa['estado'] ?><br>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<?php } ?>
