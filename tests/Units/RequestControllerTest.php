<?php

use PHPUnit\Framework\TestCase;
use App\Controllers\RequestController;

class RequestControllerTest extends TestCase
{

    
        /** @test */
        public function test_function_index_return_view_home()
        {

            $controller = new RequestController;

            $view = $controller->index();

            $this->assertIsObject($view);
            $this->assertEquals('home', $view->getView());
        }      
}