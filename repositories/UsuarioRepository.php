<?php
require_once('../Connection.php');
class UsuarioRepository {
    protected $connection;
    function __construct() {
        $this->connection = new Connection();
    }

    public function logarUsuario($login, $senha) {
        $query = "SELECT * FROM usuario WHERE login = ':login' AND password = ':senha'";
        $this->connection->execute($query, [
            'login' => $login,
            'senha' => $senha
        ]);
    }
}