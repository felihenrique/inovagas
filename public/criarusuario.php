<?php
require_once('../Connection.php');
require_once('../utilidades.php');

$_POST['senha'] = password_hash($_POST['senha'], PASSWORD_BCRYPT);
$_POST['data_nascimento'] = converter_data($_POST['data_nascimento']);
$con = new Connection();
$result = $con->execute("INSERT INTO usuario(login, senha, nome, email, rua, bairro, cidade, estado, data_nascimento)
VALUES (:login, :senha, :nome, :email, :rua, :bairro, :cidade, :estado, :data_nascimento)", $_POST);

header('Location:index.php');