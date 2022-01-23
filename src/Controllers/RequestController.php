<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\RequestModel;

class RequestController {

    public function __construct() {  
        
        if(isset($_GET['action']) && $_GET['action'] == 'store')
        {
            $this->store($_POST);
            $this->index();
            return;
        }

        $this->index();
    }

    public function index()
    {
        $data = RequestModel::all();
        return new View('home', $data);
    }

    public function store($data) : void
    {
        $request = new RequestModel($data['user'],$data['score']);
        $request->save();
        $this->index();
    }
};