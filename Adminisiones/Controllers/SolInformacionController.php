<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

define('__ROOT__', dirname(dirname(__FILE__)));

class SolInformacionController {

    private $SolInformacionModel;
    function __construct($departamento_id) {
        require_once (__ROOT__.'/Models/SolInformacion.php');
        require_once (__ROOT__.'/Models/SolInformacionModelo.php');
        $this->SolInformacionModel = new SolInformacionModelo($departamento_id);
    }
    
    function Listar() {
//        return json_encode($this->SolInformacionModel->s)
    }

}