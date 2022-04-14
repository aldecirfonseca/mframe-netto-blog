<?php

namespace App\Library;

class ControllerMain
{
    public function __construct($dados)
    { 
        $this->dados = $dados;

        // Criando o objeto do Model e conectando ao Database
        $cModel = $dados['model'] . 'Model';

        // verificando se o arquivo model existe para ser carregado
        if (file_exists("app/model/" . $cModel . ".php")) {
            require_once "app/model/" . $cModel . ".php";
            $this->model = new $cModel(); // cria objeto model
        }
    }

    /**
     * loadView - Carrega views
     *
     * @param string $nameView 
     * @param array $dbDados 
     * @return void
     */
    public function loadView($nameView, $dbDados = [])
    {
        $this->dbDados = $dbDados;

        if (file_exists("app/views/" . $nameView . ".php")) {
            require_once "app/views/" . $nameView . ".php";
        } else {
            require_once "app/views/comuns/erros.php";
        }
    }

    /**
     * loadModel
     *
     * @param string $nomeModel 
     * @return object
     */
    public function loadModel($nomeModel)
    {
        $nomeModel .= "Model";

        if (file_exists("app/model/{$nomeModel}.php")) {
            require_once "app/model/{$nomeModel}.php";
            return new $nomeModel();
        } else {
            return null;
        }
    }

    /**
     * getAcao
     *
     * @return string
     */
    public function getAcao()
    {
        return $this->dados['acao'];
    }

    /**
     * getController
     *
     * @return string
     */
    public function getController()
    {
        return $this->dados['controller'];
    }

    /**
     * getPost
     *
     * @return array
     */
    public function getPost()
    {
        return $this->dados['post'];
    }
    
    /**
     * getGet
     *
     * @return string
     */
    public function getGet()
    {
        return $this->dados['get'];
    }
}