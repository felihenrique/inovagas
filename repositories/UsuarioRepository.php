<?php
require_once('../Connection.php');
class UsuarioRepository {
    protected $connection;
    function __construct() {
        $this->connection = new Connection();
    }

    public function logarUsuario($login, $senha) {
        $query = "SELECT * FROM usuario WHERE login = :login";
        $result = $this->connection->execute($query, [
            ':login' => $login
        ]);
        if(!$result) {
            return false;
        }
        return password_verify ( $senha , $result[0]['senha'] );
    }
}