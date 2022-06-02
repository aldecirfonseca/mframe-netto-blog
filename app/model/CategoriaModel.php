<?php

use App\Library\ModelMain;

class CategoriaModel extends ModelMain
{
    public $table = "categoria";

    /**
     * lista
     *'
     * @return array
     */
    public function lista()
    {
        $aDados = $this->db->query(
            $this->table, 
            "all",
            ["orderby" => ["descricao"]]
        );
        
        return $aDados;
    }
}