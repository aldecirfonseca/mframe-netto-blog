<?php

use App\Library\ControllerMain;

class Home extends ControllerMain
{
    public function index()
    {
        $this->loadView("home", [
            "titulo" => "teste de envio de dados",
            "ano"    => 2022,
            "turma"  => "5 período"
        ]);
    }

    public function categoria()
    {
        echo "controller Home, método Categoria"; 

        $CategoriaModel = $this->loadModel("Categoria");

        var_dump($CategoriaModel->lista());
    }

    /**
     * login
     *
     * @return void
     */
    public function login()
    {
        $this->loadView("admin/login");
    }

    /**
     * homeAdmin
     *
     * @return void
     */
    public function homeAdmin()
    {
        $this->loadView("admin/homeAdmin");
    }
}