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
        $query = "SELECT * FROM usuario U INNER JOIN empresa E ON U.idusuario = E.idusuario WHERE status_aprovacao IS NULL";
        try {
            $result = $this->connection->execute($query); 
            return $result;
        }
        catch(Exception $e) {
            throw new Exception("Erro: " . $e->getMessage());
        }
    }

    public function atualizarStatus($idusuario, $novo_status) {
        $query = "UPDATE empresa SET status_aprovacao = :novo_status WHERE idusuario = :idusuario"; 
        try {
            $result = $this->connection->execute($query, [
                'novo_status' => $novo_status,
                'idusuario' => $idusuario
            ]); 
            return $result;
        }
        catch(Exception $e) {
            throw new Exception("Erro: " . $e->getMessage());
        }
    }
  
   public function buscarPorId($idusuario) {
        $query = "SELECT * FROM usuario INNER JOIN empresa 
        WHERE usuario.idusuario = :idusuario";
        try {
            $result = $this->connection->execute($query, [
                'idusuario' => $idusuario
            ]);
            if(count($result) > 0) {
              return $result[0];
            }
            else {
              return null;
            }
         }
        catch(Exception $e) {
            throw new Exception("Erro: " . $e->getMessage());
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
        $queryEmpresa = "UPDATE empresa SET
            razao_social = :razao_social,
            cnpj = :cnpj,
            area = :area,
            nome_fantasia = :nome_fantasia
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
            $this->connection->execute($queryEmpresa, [
                'razao_social' => $dados['razao_social'],
                'cnpj' => $dados['cnpj'],
                'area' => $dados['area'],
                'nome_fantasia' => $dados['nome_fantasia'],
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

