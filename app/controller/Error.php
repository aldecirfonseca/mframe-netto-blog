<?php

class Error
{
    public function controllerNotFound()
    {
        echo "Controller não Localizado.";
    }

    public function methodNotFound()
    {
        echo "Método não Localizado no controller.";
    }
}