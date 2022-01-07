<?php

namespace App\Models;

use App\Repositories\MysqlRepository\MysqlConnection;
use PDOException;

class RequestModel {

    private ?int $id;
    private string $topic;
    private string $description;
    private string $userName;
    private ?string $create_at;
    private $database;
    private $table = "requests";

    public function __construct(string $topic, string $description, string $userName, ?int $id = null, ?string $create_at = "")
    {
        $this->topic = $topic;
        $this->description = $description;
        $this->userName = $userName;
        $this->id = $id;
        $this->create_at = $create_at;

        if(!$this->database) {
            $this->database = new MysqlConnection;
        }

    }
 
    public function getId()
    {
        return $this->id;
    }

    public function getTopic()
    {
        return $this->topic;
    }

    public function setTopic($topic)
    {
        $this->topic = $topic;

        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function setUserName($userName)
    {
        $this->userName = $userName;

        return $this;
    }

    public function getCreateAt()
    {
        return $this->create_at;
    }

    static function all() : array
    {
        $database = new MysqlConnection;
        $query = $database->mysql->query("SELECT * FROM requests");
        $requestsRows = $query->fetchAll();
        $requestsList = [];

        foreach ($requestsRows as $request) {
            $obj = new self($request['topic'], $request['description'], $request['user_name'], $request['id_request'], $request['create_at']);
            array_push($requestsList, $obj);
        }

        return $requestsList;
    }

    public function save()
    {
        try {
            $this->database->mysql->query("INSERT INTO {$this->table} (topic,description,user_name) VALUES ('{$this->getTopic()}','{$this->getDescription()}','{$this->getUserName()}')");
        } catch (PDOException $ex) {
            echo "Error with database: " . $ex->getMessage();
        }
        
    }

    static function findById($id) : array
    {
        $sql = "SELECT * FROM requests WHERE id_request = $id";
        try {
            $database = new MysqlConnection;
            $query = $database->mysql->query($sql);
            $requestRow = $query->fetchAll();
            $request = new self($requestRow[0]['topic'],$requestRow[0]['description'],$requestRow[0]['user_name'],$requestRow[0]['id_request'],$requestRow[0]['create_at']);
            $data = [$request];
            return $data;
        }
        catch(PDOException $ex) {
            echo "Error: " . $ex->getMessage();
        }
    }

    static function update($id, $data) : void
    {
        try {
            $database = new MysqlConnection;
            $database->mysql->query("UPDATE requests SET topic = '{$data['topic']}',description = '{$data['description']}',user_name = '{$data['user_name']}' WHERE id_request = {$id}");
        }
        catch(PDOException $ex) {
            echo "Error: " . $ex->getMessage();
        }

    }

    static function delete($id) : void
    {
        try {
            $database = new MysqlConnection;
            $database->mysql->query("DELETE FROM requests WHERE id_request = {$id}");
        }
        catch(PDOException $ex) {
            echo "Error: " . $ex->getMessage();
        }
    }
}