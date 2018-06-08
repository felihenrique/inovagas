<form action="criaradmin.php" method="post">
    <? include('usuario/criarusuario.php'); ?>

    <div>
        <label for="rua">Data nascimento</label>
        <input type="text" name="data_nascimento" id="data_nascimento">
    </div>

    <div>
        <label for="cpf">CPF</label>
        <input type="text" name="cpf" id="cpf">
    </div>

    <input type="submit" value="Submeter">
</form>