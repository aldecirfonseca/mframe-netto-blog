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
}