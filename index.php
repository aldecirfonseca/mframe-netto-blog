<?php
    require_once 'app/config/config.php';

    $param = Routes::rota($_GET);

    // cria o objeto do controller
    $myController = new $param['controller']($param);
    
    // chama o método do controller a ser executado
    $metodo = $param['metodo'];

    $myController->$metodo();