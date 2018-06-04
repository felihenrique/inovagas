<?php
    class Connection {
        protected $pdo;

        function __construct() {
            try {
                $this->pdo = new PDO("mysql:host=localhost;dbname=inovagas", "root", "root");
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function execute($sql, $params=[]) {
            try {
                $statement = $this->pdo->prepare($sql);
                $success = $statement->execute($params);
                if(!$success) {
                    echo "Erro: " . $statement->errorInfo()[2];
                    die();
                }
                return $statement->fetchall();
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
