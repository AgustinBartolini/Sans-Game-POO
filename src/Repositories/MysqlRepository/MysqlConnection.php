<?php

namespace App\Repositories\MysqlRepository;

class MysqlConnection {
    
    public $mysql;

    public function __construct() {

        require_once("./src/config.php");
        
        $this->localhost = DBHOST;
        $this->dbname = DBNAME;
        $this->user = USER;
        $this->password = PASSWORD;
        $this->mysql = $this->getConnection();
    }

    private function getConnection()
    {
        $conection = mysqli_connect(DBHOST,USER,PASSWORD,DBNAME);

        return $conection;
    }
};