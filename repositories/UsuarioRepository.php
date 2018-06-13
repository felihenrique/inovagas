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

    public function getPerfil($idusuario) {
        $queryAdm = "SELECT * FROM usuario u INNER JOIN administrador a
        ON u.idusuario = a.idusuario
        WHERE u.idusuario = :idusuario";
        $queryEmpresa = "SELECT * FROM usuario u INNER JOIN empresa e
        ON u.idusuario = e.idusuario
        WHERE u.idusuario = :idusuario";
        try {
            $resultAdm = $this->connection->execute($queryAdm, [
                'idusuario' => $idusuario
            ]);
            $resultEmpresa = $this->connection->execute($queryEmpresa, [
                'idusuario' => $idusuario
            ]);
            if(count($resultAdm) > 0) {
                return "administrador";
            } 
            else if(count($resultEmpresa) > 0) {
                return "empresa";
            }
            else {
                return "aluno";
            }
        }
        catch(Exception $e) {
            throw new Exception("Erro na execução: " . $e->getMessage());
        }
    }
}