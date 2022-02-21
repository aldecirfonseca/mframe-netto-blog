<?php
    require_once 'system/Routes.php';

    $param = Routes::rota($_GET);

    var_dump($param);