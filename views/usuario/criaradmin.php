<h5 class="card-title">Cadastro de administradores</h5>
<form action="criaradmin.php" method="post">
    <?php require_once('views/usuario/criarusuario.php'); ?>

    <div class="form-group">
        <label for="nome">Nome</label>
        <input required class="form-control" type="text" name="nome" id="nome" placeholder="Digite o nome completo">
    </div>

    <div class="form-group">
        <label for="rua">Data nascimento</label>
        <input class="form-control" type="text" name="data_nascimento" id="data_nascimento"
        placeholder="Digite sua data de nascimento no formato DD/MM/YYYY">
    </div>

    <div class="form-group">
        <label for="cpf">CPF</label>
        <input class="form-control" type="text" name="cpf" id="cpf" placeholder="Digite seu CPF">
    </div>

    <input class="btn btn-primary" type="submit" value="Submeter">
</form>