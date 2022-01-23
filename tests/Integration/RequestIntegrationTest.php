<?php

namespace Tests\Integration;

use App\Models\RequestModel;
use App\Repositories\MysqlRepository\MysqlConnection;
use PHPUnit\Framework\TestCase;

class RequestIntegrationTest extends TestCase {
    
    private $db;

    private function initDB()
    {
        $database = new MysqlConnection();
        $database->mysql->query("DELETE FROM requests");
        $database->mysql->query("ALTER TABLE requests AUTO_INCREMENT = 1");
        $this->db = $database;
    }

    protected function setUp(): void
    {
        parent::setUp();
    
        $this->initDB();
    }
    public function test_can_retrieve_an_requests_list()
    {
        $this->db->mysql->query("INSERT INTO requests (user,score) VALUE ('usuario11','200')");
        $this->db->mysql->query("INSERT INTO requests (user,score) VALUE ('usuario22','125')");

        $requestsList = RequestModel::all();

        $this->assertEquals("usuario11", $requestsList[0]->getUser());
        $this->assertEquals("200", $requestsList[0]->getScore());
        $this->assertEquals("usuario22", $requestsList[1]->getUser());
        $this->assertEquals("125", $requestsList[1]->getScore());
    }
}