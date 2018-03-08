<?php
class Database {
    private $connection;
    protected $host   = DB_HOST; // hostname of your server 
    protected $user   = DB_USERNAME; // username of your server
    protected $pass   = DB_PASSWORD; // password of your server ( leave blank if there's no password )
    protected $dbname = DB_NAME; // database of your server
    
    public function __construct() {
        $this->connection = new mysqli($this->host,$this->user,$this->pass,$this->dbname);
    }
    
    public function connect() {
        return $this->connection;
    }

}


class Model {
    protected $db;
    
    public function __construct() {
        $connection = new Database();
        $this->db = $connection->connect();   
    }
    
}

