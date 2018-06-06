<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
define('__ROOT__', dirname(dirname(__FILE__)));

class SolInformacionModelo {

    private $db;//almacena la conexion con la base de datos
    private $array;
    private $departamento_id;
    private $LastFormId;
    
    function __construct($departamento_id) {
        require_once (__ROOT__."/../Configurations/Conectar.php");
        require_once (__ROOT__."/Models/SolInformacion.php");
        $this->db=conectar::conexion();
        $this->array = array();
        $this->departamento_id = $departamento_id;
        $this->LastFormId = $this->db->query("SELECT ISNULL(MAX(admision_form_id)) FROM `admision`")->fetchColumn();
    }

    function ListSolInformacion() {
        $consulta = $this->db->query("SELECT * FROM `admision` WHERE `departamento_id` = $this->departamento_id");
        while($fila = $consulta->fetch(PDO::FETCH_ASSOC))
        {
            $solinformacion = new SolInformacion();
            $solinformacion->setAdmision_form_id($fila['admision_form_id']);
            $solinformacion->setAdmision_form_inf_ape($fila['admision_form_inf_ape']);
            $solinformacion->setAdmision_form_inf_cid($fila['admision_form_inf_cid']);
            $solinformacion->setAdmision_form_inf_fech($fila['admision_form_inf_fech']);
            $solinformacion->setAdmision_form_inf_nom($fila['admision_form_inf_nom']);
            $solinformacion->setAdmision_form_inf_telf($fila['admision_form_inf_telf']);
            $this->array[] = $solinformacion;
        }
    }
    
    
}