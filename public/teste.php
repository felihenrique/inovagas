<?php
require_once('../Connection.php');

$con = new Connection();
$result = $con->execute("INSERT INTO usuario(login, senha, nome, email, rua, bairro, cidade, estado, data_nascimento)
VALUES (:login, :senha, :nome, :email, :rua, :bairro, :cidade, :estado, :data_nascimento)",
[
    ':login' => 'felipe',
    ':senha' => password_hash('123456', PASSWORD_BCRYPT),
    ':nome' => 'felipe',
    ':email' => 'felihenrique@gmail.com',
    ':rua' => 'aa',
    ':bairro' => 'aa',
    ':cidade' => 'aa',
    ':estado' => 'aa',
    ':data_nascimento' => '2017-12-12'
]);