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
        $query = "SELECT *,
        (SELECT vs.nome FROM vaga_historico vh INNER JOIN vaga_status vs ON vh.idstatus = vs.idstatus
        WHERE vh.idvaga = vaga.idvaga
        ORDER BY data DESC LIMIT 1) as status,
        (SELECT vh.data FROM vaga_historico vh INNER JOIN vaga_status vs ON vh.idstatus = vs.idstatus
        WHERE vh.idvaga = vaga.idvaga
        ORDER BY data DESC LIMIT 1) as data
        FROM vaga
        WHERE vaga.idempresa=:idempresa
        AND NOT EXISTS(SELECT idhistorico FROM vaga_historico vh WHERE vh.idstatus = 5 AND vh.idvaga = vaga.idvaga)
        ORDER BY titulo";
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
        $query = "SELECT *,
        (SELECT vs.nome FROM vaga_historico vh INNER JOIN vaga_status vs ON vh.idstatus = vs.idstatus
        WHERE vh.idvaga = vaga.idvaga
        ORDER BY data DESC LIMIT 1) as status,
        (SELECT vh.data FROM vaga_historico vh INNER JOIN vaga_status vs ON vh.idstatus = vs.idstatus
        WHERE vh.idvaga = vaga.idvaga
        ORDER BY data DESC LIMIT 1) as data
        FROM vaga
        WHERE vaga.idempresa=:idempresa
        AND EXISTS(SELECT idhistorico FROM vaga_historico vh WHERE vh.idstatus = 5 AND vh.idvaga = vaga.idvaga)
        ORDER BY titulo";
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
        $query = "SELECT *,
        (SELECT vs.nome FROM vaga_historico vh INNER JOIN vaga_status vs ON vh.idstatus = vs.idstatus 
        WHERE vh.idvaga = vaga.idvaga
        ORDER BY data DESC LIMIT 1) as status,
        (SELECT vh.data FROM vaga_historico vh INNER JOIN vaga_status vs ON vh.idstatus = vs.idstatus
        WHERE vh.idvaga = vaga.idvaga
        ORDER BY data DESC LIMIT 1) as data
        FROM vaga
        WHERE vaga.idempresa=:idempresa
        AND EXISTS(SELECT * FROM vaga_historico vh WHERE vh.idvaga = vaga.idvaga AND vh.idstatus = 2)
        AND NOT EXISTS(SELECT * FROM vaga_historico vh WHERE vh.idstatus = 5 AND vh.idvaga = vaga.idvaga)
        ORDER BY titulo";
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

    public function listarCandidatos($idvaga, $entrevista) {
        $query = "SELECT C.idcandidatura, A.nome, A.semestre_inicio, A.ano_inicio, 
        A.curso, A.data_nascimento 
        FROM candidatura C 
        INNER JOIN aluno A ON A.idusuario = C.idaluno
        INNER JOIN vaga V ON V.idvaga = C.idvaga
        WHERE V.idvaga = :idvaga";
        if($entrevista) {
            $query .= " AND NOT EXISTS(SELECT identrevista 
                FROM entrevista E WHERE E.idcandidatura = C.idcandidatura)";   
        }
        
         try {
            $result = $this->connection->execute($query, [
                'idvaga' => $idvaga
            ]);
            return $result;
        }
        catch(Exception $e) {
            throw new Exception("Erro: " . $e->getMessage());
        }
    }

    public function candidatar($idvaga, $idusuario) {
        $query = "UPDATE candidatura SET idvaga = :idvaga WHERE idaluno = :idusuario"; 
        try {
            $result = $this->connection->execute($query, [
                'idvaga' => $idvaga,
                'idusuario' => $idusuario
            ]); 
            return $result;
        }
        catch(Exception $e) {
            throw new Exception("Erro: " . $e->getMessage());
        }
    }

    public function listarEmSelecao($idempresa) {
        $query = "SELECT *,
        (SELECT vs.nome FROM vaga_historico vh INNER JOIN vaga_status vs ON vh.idstatus = vs.idstatus 
        WHERE vh.idvaga = vaga.idvaga
        ORDER BY data DESC LIMIT 1) as status,
        (SELECT vh.data FROM vaga_historico vh INNER JOIN vaga_status vs ON vh.idstatus = vs.idstatus
        WHERE vh.idvaga = vaga.idvaga
        ORDER BY data DESC LIMIT 1) as data
        FROM vaga
        WHERE vaga.idempresa=:idempresa
        AND EXISTS(SELECT * FROM vaga_historico vh WHERE vh.idvaga = vaga.idvaga AND vh.idstatus = 3)
        AND NOT EXISTS(SELECT * FROM vaga_historico vh WHERE vh.idstatus IN (5, 4) AND vh.idvaga = vaga.idvaga)
        ORDER BY titulo";
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

    public function avancarFaseDeSelecao($idvaga) {
        $query = "INSERT INTO vaga_historico(idvaga, idstatus, data) VALUES (:idvaga, 3, NOW())";
        try {
            $result = $this->connection->execute($query, [
                'idvaga' => $idvaga
            ]); 
            return $result;
        }
        catch(Exception $e) {
            throw new Exception("Erro: " . $e->getMessage());
        }
    }

    public function cancelar($idvaga) {
        //CRIA NOVO HISTORICO
        $this->connection->execute("INSERT INTO vaga_historico(idvaga, idstatus, data) 
        VALUES (:idvaga, :idstatus, NOW())", 
        [
            ':idvaga' => $idvaga,
            ':idstatus' => 5,
        ]);
        return true;
    }

    public function publicar($idvaga) {
        //CRIA NOVO HISTORICO
        $this->connection->execute("INSERT INTO vaga_historico(idvaga, idstatus, data) 
        VALUES (:idvaga, :idstatus, NOW())", 
        [
            ':idvaga' => $idvaga,
            ':idstatus' => 2,
        ]);
        return true;
    }

    public function cadastrarEntrevistaEmLote($dados) {
        
        $this->connection->getPDO()->beginTransaction();
        try {
           $queryEntrevista = "INSERT INTO entrevista(local, mensagem, idcandidatura, data)
           VALUES (:local, :mensagem, :idcandidatura, :data)";
           foreach($dados['listaalunos'] as $aluno) {
            $this->connection->execute($queryEntrevista, [
                'local' => $dados['local'],
                'mensagem' => $dados['mensagem'],
                'idcandidatura' => $aluno,
                'data' => converter_data($dados['data'])
            ]);
           }
           $this->connection->getPDO()->commit();
           return true;
       }
       catch(Exception $e) {
           $this->connection->getPDO()->rollBack();
           echo $e->getMessage();
           return false;
       }
    }

    public function finalizarVaga($idvaga) {
        $this->connection->execute("INSERT INTO vaga_historico(idvaga, idstatus, data) 
        VALUES (:idvaga, :idstatus, NOW())", 
        [
            'idvaga' => $idvaga,
            'idstatus' => 4,
        ]);
    }
}