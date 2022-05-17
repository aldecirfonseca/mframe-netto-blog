<?php

namespace App\Library;

class ModelMain
{
    protected $db;
    public $table;
    
    /**
     * construct
     */
    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * getById
     *
     * @param integer $id 
     * @return array
     */
    public function getById($id)
    {
        //$rsc = $this->db->dbSelect("SELECT * FROM {$this->table} WHERE id = {$id}");      
        //return $this->db->dbBuscaArray($rsc);

        return $this->db->query(
            $this->table,
            'first',
            ['where' => ["id" => $id]]
        );
    }
}