<?php
require_once("Repository.php");
class EmpresaRepository extends Repository {
    public function criar($dados) {
        $dados['senha'] = password_hash($_POST['senha'], PASSWORD_BCRYPT);
        $dados['data_nascimento'] = converter_data($_POST['data_nascimento']);
        try {
            $this->connection->getPDO()->beginTransaction();
            $this->connection->execute("INSERT INTO usuario(login, senha, email, rua, bairro, cidade, estado)
            VALUES (:login, :senha, :email, :rua, :bairro, :cidade, :estado)", [
                ':login' => $dados['login'],
                ':senha' => $dados['senha'],
                ':email' => $dados['email'],
                ':rua' => $dados['rua'],
                ':bairro' => $dados['bairro'],
                ':cidade' => $dados['cidade'],
                ':estado' => $dados['estado']
            ]);
            $idusuario = $this->connection->getPDO()->lastInsertId();
            $this->connection->execute("INSERT INTO empresa(idusuario, razao_social, cnpj, area, nome_fantasia) 
            VALUES (:idusuario, :razao_social, :cnpj, :area, :nome_fantasia)", 
            [
                ':idusuario' => $idusuario,
                ':razao_social' => $dados['razao_social'],
                ':cnpj' => $dados['cnpj'],
                ':area' => $dados['area'],
                ':nome_fantasia' => $dados['nome_fantasia']
            ]);
            $this->connection->getPDO()->commit();
            return true;
        }
        catch(Exception $e) {
            $this->connection->getPDO()->rollBack();
            echo $e->getMessage();
            return false;
        }
    }

    public function listarPreCadastradas() {
        $query = "SELECT * FROM empresa INNER JOIN usuario WHERE aprovado = :aprovado";
        $result = $this->connection->execute($query, [
            ':aprovado' => '0'
        ]); 
        return $result;
    }
}