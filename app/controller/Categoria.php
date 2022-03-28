<?php

use App\Library\ControllerMain;

class Categoria extends ControllerMain
{
    public function index()
    {
        $this->loadView("admin/listaCategoria", $this->model->lista());
    }
}