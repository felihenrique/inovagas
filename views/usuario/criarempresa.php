<form action="criarempresa.php" method="post">
    <?php require_once('views/usuario/criarusuario.php'); ?>

    <div class="form-group">
        <label for="razao_social">Razão social</label>
        <input required class="form-control" type="text" name="razao_social" id="razao_social" 
        placeholder="Digite a razão social">
    </div>

    <div class="form-group">
        <label for="cnpj">CNPJ</label>
        <input class="form-control" type="text" name="cnpj" id="cnpj" placeholder="Digite o CNPJ da empresa">
    </div>

    <div class="form-group">
        <label for="area">Área</label>
        <input class="form-control" type="text" name="area" id="area" placeholder="Digite a área em que a empresa atua">
    </div>

    <input class="btn btn-primary" type="submit" value="Submeter">
</form>