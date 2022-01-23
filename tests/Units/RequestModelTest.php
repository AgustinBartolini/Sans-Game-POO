<?php

use App\Models\RequestModel;
use PHPUnit\Framework\TestCase;

class RequestModelTest extends TestCase {
    
    /** @test */
    public function test_request_can_access_to_all_attributes_not_include_id_and_create_at()
    {
        $requestData = [
            "id" => null,
            "user" => "giaco",
            "score" => "109",
        ];

        $request = new RequestModel($requestData["user"], $requestData["score"], $requestData["id"]);

        $this->assertEquals("giaco", $request->getUser());
        $this->assertEquals("109", $request->getScore());
    }
    

}