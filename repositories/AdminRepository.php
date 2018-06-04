<?php
require_once("repositories/Repository.php");
class AdminRepository extends Repository {
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
            $this->connection->execute("INSERT INTO administrador(idusuario, cpf, nome) VALUES (:idusuario, :cpf, :nome)", [
                ':idusuario' => $idusuario,
                ':cpf' => $dados['cpf'],
                ':nome' => $dados['nome']
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
}