<?php
    class Connection {
        protected $pdo;

        function __construct() {
            $this->pdo = new PDO("mysql:host=localhost;dbname=inovagas", "root", "root");
            if($this->pdo) {
                echo "Não foi possível conectar ao banco";
                die();
            }
        }

        public function execute($sql, $params) {
            $statement = $this->pdo->prepare($sql);
            foreach($params as $key => $value) {
                $statement->bindParam(':' + $key, $value);
            }
            return $statement->execute();
        }
    }
