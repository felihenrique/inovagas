<h5 class="card-title">Editar perfil</h5>
<form action="editarempresa.php" method="post">
    <?php require_once('views/usuario/editarusuario.php'); ?>

    <div class="form-group">
        <label for="razao_social">Razão social</label>
        <input required class="form-control" type="text" name="razao_social" id="razao_social" 
        placeholder="Digite a razão social" value="<?php echo $dados['razao_social'] ?>">
    </div>

    <div class="form-group">
        <label for="cnpj">CNPJ</label>
        <input required class="form-control" type="text" name="cnpj" id="cnpj" 
        placeholder="Digite o CNPJ da empresa" value="<?php echo $dados['cnpj'] ?>">
    </div>

    <div class="form-group">
        <label for="area">Área</label>
        <input class="form-control" type="text" name="area" id="area" 
        placeholder="Digite a área em que a empresa atua" value="<?php echo $dados['area'] ?>">
    </div>

    <div class="form-group">
        <label for="nome_fantasia">Nome fantasia</label>
        <input required class="form-control" type="text" name="nome_fantasia" id="nome_fantasia" 
        placeholder="Digite o nome fantasia da empresa" value="<?php echo $dados['nome_fantasia'] ?>">
    </div>

    <input type="hidden" id="idusuario" name="idusuario" value="<?php echo $dados['idusuario'] ?>">
    <input class="btn btn-primary" type="submit" value="Submeter">
</form>