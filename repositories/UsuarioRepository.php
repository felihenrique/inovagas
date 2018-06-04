<?php
require_once("repositories/Repository.php");
class UsuarioRepository extends Repository {
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