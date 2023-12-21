<?php

namespace BDD;
use \PDO;

class Database{
    private static $instance = null;
    private $host;
    private $db;
    private $user;
    private $password;
    private $port;
    private $charset;
    private $option;
    private $pdo;

    private function __construct(){
        $this->host = "mysql-noeldeschimeres.alwaysdata.net";
        $this->db = "noeldeschimeres_bdd";
        $this->user = "340338";
        $this->password = getenv('MDP_BDD');
        $this->port = "3306";
        $this->charset = "utf8";
        $this->option = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES '. $this->charset);
    }

    public static function getInstance(){
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function getPDO(){
        if($this->pdo === null){
            try {
                $pdo = new PDO('mysql:host='.$this->host.';dbname='.$this->db.';port='.$this->port.';charset='.$this->charset, $this->user, $this->password, $this->option);
                $this->pdo = $pdo;
            } catch(\PDOException $e){
                throw new \PDOException($e->getMessage(), $e->getCode());
            }            
        }
        return $this->pdo;
    }

    public function query($statement){
        $query = $this->getPDO()->prepare($statement);
        $query->execute();
        $datas = $query->fetchAll(PDO::FETCH_ASSOC);
        return $datas;
    }
}
?>