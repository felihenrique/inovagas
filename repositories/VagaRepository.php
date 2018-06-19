<?php
require_once("Repository.php");
class VagaRepository extends Repository {
    
    public function criar($dados, $idempresa) {
     $dados['prazo_inscricoes'] = converter_data($_POST['prazo_inscricoes']);
        try {
            $this->connection->getPDO()->beginTransaction();
            $this->connection->execute("INSERT INTO vaga(remuneracao, prazo_inscricoes, area, descricao, titulo, carga_horaria, meses_duracao, data_cadastro, idempresa)
            VALUES (:remuneracao, :prazo_inscricoes, :area, :descricao, :titulo, :carga_horaria, :meses_duracao, NOW(), :idempresa)", [
                ':remuneracao' => $dados['remuneracao'],
                ':prazo_inscricoes' => $dados['prazo_inscricoes'],
                ':area' => $dados['area'],
                ':descricao' => $dados['descricao'],
                ':titulo' => $dados['titulo'],
                ':carga_horaria' => $dados['carga_horaria'],
                ':meses_duracao' => $dados['meses_duracao'],
                ':idempresa' => $idempresa
            ]);

            //RECUPERA ID DA VAGA
            $idvaga = $this->connection->getPDO()->lastInsertId();
            
            //STATUS
            $query = "SELECT * FROM vaga_status WHERE nome='Criada'";
            try {
                $idstatus = $this->connection->execute($query);
            }
            catch(Exception $e) {
                throw new Exception("Erro: " . $e->getMessage());
            }
            
            //CRIA HISTORICO
            $this->connection->execute("INSERT INTO vaga_historico(idvaga, idstatus, data) 
            VALUES (:idvaga, :idstatus, NOW())", 
            [
                ':idvaga' => $idvaga,
                ':idstatus' => $idstatus[0]["idstatus"],
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

    public function listar($idempresa){
      //  var_dump($idempresa);
      //  die();
        $query = "SELECT vaga.*, vaga_historico.idstatus, vaga_historico.data, vaga_status.nome, empresa.idusuario FROM vaga INNER JOIN vaga_historico ON(vaga.idvaga=vaga_historico.idvaga) INNER JOIN vaga_status ON(vaga_status.idstatus=vaga_historico.idstatus) INNER JOIN empresa ON (vaga.idempresa = empresa.idusuario) WHERE empresa.idusuario = '{$idempresa}' ORDER BY vaga.titulo";
         try {
            $result = $this->connection->execute($query, [
                'idempresa' => $idempresa
            ]);
            return $result;
        }
        catch(Exception $e) {
            throw new Exception("Erro: " . $e->getMessage());
        }
    }

    public function listarCanceladas($idempresa){
      //  var_dump($idempresa);
      //  die();
        $query = "SELECT vaga.*, vaga_historico.idstatus, vaga_historico.data, vaga_status.nome, empresa.idusuario FROM vaga INNER JOIN vaga_historico ON(vaga.idvaga=vaga_historico.idvaga) INNER JOIN vaga_status ON(vaga_status.idstatus=vaga_historico.idstatus) INNER JOIN empresa ON (vaga.idempresa = empresa.idusuario) WHERE empresa.idusuario = '{$idempresa}' AND vaga_status.nome='Cancelada' ORDER BY vaga.titulo";
         try {
            $result = $this->connection->execute($query, [
                'idempresa' => $idempresa
            ]);
            return $result;
        }
        catch(Exception $e) {
            throw new Exception("Erro: " . $e->getMessage());
        }
    }

    public function listarPublicadas($idempresa){
      //  var_dump($idempresa);
      //  die();
        $query = "SELECT vaga.*, vaga_historico.idstatus, vaga_historico.data, vaga_status.nome, empresa.idusuario FROM vaga INNER JOIN vaga_historico ON(vaga.idvaga=vaga_historico.idvaga) INNER JOIN vaga_status ON(vaga_status.idstatus=vaga_historico.idstatus) INNER JOIN empresa ON (vaga.idempresa = empresa.idusuario) WHERE empresa.idusuario = '{$idempresa}' AND vaga_status.nome='Publicada' ORDER BY vaga.titulo";
         try {
            $result = $this->connection->execute($query, [
                'idempresa' => $idempresa
            ]);
            return $result;
        }
        catch(Exception $e) {
            throw new Exception("Erro: " . $e->getMessage());
        }
    }

    public function buscarPorId($idvaga) {
        $query = "SELECT * FROM vaga WHERE idvaga = :idvaga";
        try {
            $result = $this->connection->execute($query, [
                'idvaga' => $idvaga
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

    public function alterar($dados) {
        $dados['prazo_inscricoes'] = converter_data($dados['prazo_inscricoes']);
        $query = "UPDATE vaga SET titulo=:titulo, descricao=:descricao, prazo_inscricoes=:prazo_inscricoes, meses_duracao=:meses_duracao, carga_horaria=:carga_horaria, remuneracao=:remuneracao, area=:area WHERE idvaga=:idvaga ";
        
        $this->connection->execute($query,$dados);
        return true;
    }

    public function deletar($idvaga) {
        $query = "DELETE FROM vaga WHERE idvaga = :idvaga";
        $this->connection->execute($query,[
                'idvaga' => $idvaga
        ]);
        
        return true;
    }

    public function cancelar($idvaga) {
         $this->connection->getPDO()->beginTransaction();
         try {   
            //STATUS
            $query = "SELECT * FROM vaga_status WHERE nome='Cancelada'";
            try {
                $idstatus = $this->connection->execute($query);
            }
            catch(Exception $e) {
                throw new Exception("Erro: " . $e->getMessage());
            }
            
            //CRIA NOVO HISTORICO
            $this->connection->execute("INSERT INTO vaga_historico(idvaga, idstatus, data) 
            VALUES (:idvaga, :idstatus, NOW())", 
            [
                ':idvaga' => $idvaga,
                ':idstatus' => $idstatus[0]["idstatus"],
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

    public function publicar($idvaga) {
         $this->connection->getPDO()->beginTransaction();
         try {   
            //STATUS
            $query = "SELECT * FROM vaga_status WHERE nome='Publicada'";
            try {
                $idstatus = $this->connection->execute($query);
            }
            catch(Exception $e) {
                throw new Exception("Erro: " . $e->getMessage());
            }
            
            //CRIA NOVO HISTORICO
            $this->connection->execute("INSERT INTO vaga_historico(idvaga, idstatus, data) 
            VALUES (:idvaga, :idstatus, NOW())", 
            [
                ':idvaga' => $idvaga,
                ':idstatus' => $idstatus[0]["idstatus"],
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