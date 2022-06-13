<?php

use App\Library\ControllerMain;
use App\Library\Redirect;
use App\Library\Session;

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