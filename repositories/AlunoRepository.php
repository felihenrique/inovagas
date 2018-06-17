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

    public function buscarPorId($idusuario) {
        $query = "SELECT * FROM usuario INNER JOIN aluno 
        WHERE usuario.idusuario = :idusuario";
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

    public function editar($dados) {
        $queryUser = "UPDATE usuario SET 
            email = :email,
            rua = :rua,
            bairro = :bairro,
            cidade = :cidade,
            estado = :estado
            WHERE idusuario = :idusuario
        ";
        $queryAluno = "UPDATE aluno SET
            semestre_inicio = :semestre_inicio,
            ano_inicio = :ano_inicio,
            curso = :curso,
            cpf = :cpf,
            num_matricula = :num_matricula,
            nome = :nome,
            data_nascimento = :data_nascimento
            WHERE idusuario = :idusuario
        ";
        try {
            $this->connection->getPDO()->beginTransaction();
            $this->connection->execute($queryUser, [
                'email' => $dados['email'],
                'rua' => $dados['rua'],
                'bairro' => $dados['bairro'],
                'cidade' => $dados['cidade'],
                'estado' => $dados['estado'],
                'idusuario' => $dados['idusuario']
            ]);
            $this->connection->execute($queryAluno, [
                'semestre_inicio' => $dados['semestre_inicio'],
                'ano_inicio' => $dados['ano_inicio'],
                'curso' => $dados['curso'],
                'cpf' => $dados['cpf'],
                'num_matricula' => $dados['num_matricula'],
                'nome' => $dados['nome'],
                'data_nascimento' => converter_data($dados['data_nascimento']),
                'idusuario' => $dados['idusuario']
            ]);
            $this->connection->getPDO()->commit();
            return true;
        }
        catch(Exception $e) {
            $this->connection->getPDO()->rollBack();
            throw new Exception("Erro: " . $e->getMessage());
        }
    }

}