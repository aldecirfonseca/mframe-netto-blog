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
        $rsc = $this->db->dbSelect("SELECT * FROM {$this->table} ORDER BY descricao");
        $aDados = $this->db->dbBuscaArrayAll($rsc);

        return $aDados;
    }
}