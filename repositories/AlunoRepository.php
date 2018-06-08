<?php
require_once("Repository.php");
class AlunoRepository extends Repository {
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
            $this->connection->execute("INSERT INTO aluno(idusuario, semestre_inicio, ano_inicio, curso, cpf, num_matricula, foto, nome, data_nascimento) 
            VALUES (:idusuario, :semestre_inicio, :ano_inicio, :curso, :cpf, :num_matricula, :foto, :nome, :data_nascimento)", 
            [
                ':idusuario' => $idusuario,
                ':semestre_inicio' => $dados['semestre_inicio'],
                ':ano_inicio' => $dados['ano_inicio'],
                ':curso' => $dados['curso'],
                ':cpf' => $dados['cpf'],
                ':num_matricula' => $dados['num_matricula'],
                ':foto' => $dados['foto'],
                ':nome' => $dados['nome'],
                ':data_nascimento' => $dados['data_nascimento']
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