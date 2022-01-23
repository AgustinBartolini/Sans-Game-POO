<?php

namespace App\Models;

use App\Repositories\MysqlRepository\MysqlConnection;

class RequestModel {

    private ?int $id;
    private string $user;
    private int $score;
    private $database;
    private $table = "requests";

    public function __construct( string $user, int $score, ?int $id = null)
    {
        $this->user = $user;
        $this->score = $score;
        $this->id = $id;

        if(!$this->database) {
            $this->database = new MysqlConnection;
        }

    }
 
    public function getId()
    {
        return $this->id;
    }

    public function getScore()
    {
        return $this->score;
    }

    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUserName($user)
    {
        $this->user = $user;

        return $this;
    }

    static function all() : array
    {
        $database = new MysqlConnection;
        $query = $database->mysql->query("SELECT * FROM `requests`");
        $requestsRows = $query->fetch_all();
        $requestsList = [];

        foreach ($requestsRows as $request) {
            $obj = new self($request[1], $request[2]);
            array_push($requestsList, $obj);
        }

        return $requestsList;
    }

    public function save()
    {
        $this->database->mysql->query("INSERT INTO {$this->table} (user, score) VALUES ('{$this->getUser()}',{$this->getScore()}')");    
    }
};