<?php

namespace App\Core;

class View {

    private $view;

    public function __construct(string $view, array $data = null)
    {
        $this->view = $view;
        require_once("./src/Views/$view.php");
    }

    public function getView()
    {
        return $this->view;
    }
}