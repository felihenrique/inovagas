<?php
require_once('Connection.php');

abstract class Repository {
    protected $connection;
    function __construct() {
        $this->connection = new Connection();
    }
}