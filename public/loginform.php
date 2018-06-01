<?php
    require_once('../header.php');
?>
<form action="loginverificar.php" method="post">
    <label for="login">Login: </label>
    <input type="text" name="login" id="login">
    <label for="login">Senha: </label>
    <input type="text" name="senha" id="senha">
    <input type="submit" value="Continuar">
</form>
<?php
    require_once('../footer.php');
?>
