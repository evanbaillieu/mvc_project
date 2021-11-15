<?php
class Connection {
    private $host;
    private $dbname;
    private $username;
    private $password;
    private $db;

    public function __construct() {
        $this->host = 'localhost:8889';
        $this->dbname = 'tp1';
        $this->username = 'root';
        $this->password = 'root';
        
        try {
            $this->db = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';charset=utf8', $this->username, $this->password);
            echo "connexion succes";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getDb()
    {
        return $this->db;
    }
}
