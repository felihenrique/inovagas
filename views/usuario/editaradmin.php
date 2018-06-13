<h5 class="card-title">Editar perfil</h5>
<form action="editaradmin.php" method="post">
    <?php require_once('views/usuario/editarusuario.php'); ?>

    <div class="form-group">
        <label for="nome">Nome</label>
        <input required class="form-control" type="text" name="nome" id="nome" placeholder="Digite o nome completo"
        value="<?php echo $dados['nome'] ?>">
    </div>

    <div class="form-group">
        <label for="rua">Data nascimento</label>
        <input class="form-control" type="text" name="data_nascimento" id="data_nascimento"
        placeholder="Digite sua data de nascimento no formato DD/MM/YYYY" 
        value="<?php echo $dados['data_nascimento'] ?>">
    </div>

    <div class="form-group">
        <label for="cpf">CPF</label>
        <input class="form-control" type="text" name="cpf" id="cpf" placeholder="Digite seu CPF" 
        value="<?php echo $dados['cpf'] ?>">
    </div>

    <input type="hidden" id="idusuario" name="idusuario" value="<?php echo $dados['idusuario'] ?>">
    <input class="btn btn-primary" type="submit" value="Submeter">
</form>