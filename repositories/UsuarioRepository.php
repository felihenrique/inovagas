<?php
require_once("Repository.php");
class UsuarioRepository extends Repository {
    public function logar($login, $senha) {
        $query = "SELECT * FROM usuario WHERE login = :login";
        $result = $this->connection->execute($query, [
            ':login' => $login
        ]);
        if(!$result) {
            return false;
        }
        $passValido = password_verify ( $senha , $result[0]['senha'] );
        return $passValido ? $result : false;
    }

    public function buscarPorId($idusuario) {
        $query = "SELECT * FROM usuario WHERE idusuario = :idusuario";
        try {
            $result = $this->connection->execute($query, [
                'idusuario' => $idusuario
            ]);
        }
        catch(Exception $e) {
            throw new Exception("Erro: " . $e->getMessage());
        }
        if(count($result) > 0) {
            return $result[0];
        }
        else {
            return null;
        }
    }
}