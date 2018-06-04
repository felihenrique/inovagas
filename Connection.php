<?php
    class Connection {
        protected $pdo;

        function __construct() {
            try {
                $this->pdo = new PDO("mysql:host=127.0.0.1;dbname=inovagas", "root", "root");
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function getPDO() {
            return $this->pdo;
        }

        public function execute($sql, $params=[]) {
            $statement = $this->pdo->prepare($sql);
            $success = $statement->execute($params);
            if(!$success) {
                throw new Exception("Erro: " . $statement->errorInfo()[2]);
            }
            return $statement->fetchall();
        }
    }
