<div class="container">
<?php if($login_failed) { ?>
    <div class="alert alert-danger">
    <strong>Erro!</strong> Usuário ou senha incorretos.
    </div>
<?php } ?>
<form action="login.php" method="post">
    <div class="form-group">
        <label for="login">Login: </label>
        <input type="text" class="form-control" name="login" id="login" placeholder="Digite o login">
    </div>
    
    <div class="form-group">
        <label for="login">Senha: </label>
        <input type="password" class="form-control" name="senha" id="senha" placeholder="Digite a senha">
    </div>
    
    <button type="submit" class="btn btn-primary">Continuar</button>
</form>
</div>
