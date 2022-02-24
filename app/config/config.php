<?php

// constante que define a base URL
define("SITEURL", "http://{$_SERVER['HTTP_HOST']}/");

// Constantes utilizadas no AutoLoad
define("DS", DIRECTORY_SEPARATOR);
define("ROOT", __FILE__);

// Carregamentos

require_once 'system/Routes.php';       // Carrega a library do sistema de rotas