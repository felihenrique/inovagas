<?php
    class Connection {
        protected $pdo;

        function __construct() {
            try {
                $conf = $GLOBALS['conf'];
                $dbname = $conf['DB_NAME'];
                $dbuser = $conf['DB_USER'];
                $dbpass = $conf['DB_PASSWORD'];
                $dbhost = $conf['DB_HOST'];
                $this->pdo = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
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
            return $statement->fetchAll();
        }
    }
