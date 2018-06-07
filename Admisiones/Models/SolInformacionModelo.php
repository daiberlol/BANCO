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
        require_once ("/../../Configurations/Conectar.php");
        require_once ("/../Models/SolInformacion.php");
        $this->db=conectar::conexion();
        $this->array = array();
        $this->departamento_id = $departamento_id;
        $this->LastFormId = $this->db->query("SELECT IFNULL(MAX(admision_form_id),0)+1  FROM `admision`")->fetchColumn();
    }

    function ListSolInformacion() {
        $consulta = $this->db->query("SELECT * FROM `admision` WHERE `departamento_id` = $this->departamento_id");
        while($fila = $consulta->fetch(PDO::FETCH_ASSOC))
        {
            $solinformacion = new SolInformacion($this->departamento_id);
            $solinformacion->setAdmision_form_id($fila['admision_form_id']);
            $solinformacion->setAdmision_form_inf_ape($fila['admision_form_inf_ape']);
            $solinformacion->setAdmision_form_inf_cid($fila['admision_form_inf_cid']);
            $solinformacion->setAdmision_form_inf_fech($fila['admision_form_inf_fech']);
            $solinformacion->setAdmision_form_inf_nom($fila['admision_form_inf_nom']);
            $solinformacion->setAdmision_form_inf_telf($fila['admision_form_inf_telf']);
            $this->array[] = $solinformacion;
        }
        return $this->array;
    }
    function SearchSolInformacion($admision_form_id) {
        $consulta = $this->db->query("SELECT * FROM `admision` WHERE `departamento_id` = $this->departamento_id and `admision_form_id` = $admision_form_id");
        return $consulta->fetch();
    }
    function AddSolInformacion($solinformacion) {
        $departamento_id =  $this->departamento_id;
        $admision_form_id = $this->LastFormId;
        $admision_form_inf_ape = $solinformacion->getAdmision_form_inf_ape();
        $admision_form_inf_cid = $solinformacion->getAdmision_form_inf_cid();
        $admision_form_inf_fech = $solinformacion->getAdmision_form_inf_fech();
        $admision_form_inf_nom = $solinformacion->getAdmision_form_inf_nom();
        $admision_form_inf_telf = $solinformacion->getAdmision_form_inf_telf();
        $admision_form_inf_type = $solinformacion->getAdmision_form_type();
        
        if($this->db->query("INSERT INTO `admision`(`departamento_id`, `admision_form_id`, `admision_form_type`, `admision_form_inf_nom`,`admision_form_inf_ape`, `admision_form_inf_fech`, `admision_form_inf_telf`, `admision_form_inf_cid`) VALUES ($departamento_id,$admision_form_id,'$admision_form_inf_type','$admision_form_inf_nom','$admision_form_inf_ape','$admision_form_inf_fech',$admision_form_inf_telf,$admision_form_inf_cid)"))
        {
            return true;
        }else{
            return false;
        }
        
    }
    function EditSolInformacion($solinformacion){
        $departamento_id =  $this->departamento_id;
        $admision_form_id = $solinformacion->getAdmision_form_id();
        $admision_form_inf_ape = $solinformacion->getAdmision_form_inf_ape();
        $admision_form_inf_cid = $solinformacion->getAdmision_form_inf_cid();
        $admision_form_inf_fech = $solinformacion->getAdmision_form_inf_fech();
        $admision_form_inf_nom = $solinformacion->getAdmision_form_inf_nom();
        $admision_form_inf_telf = $solinformacion->getAdmision_form_inf_telf();
        $admision_form_inf_type = $solinformacion->getAdmision_form_type();
        
        if($this->db->query("UPDATE `admision` SET `admision_form_type`='$admision_form_inf_type',`admision_form_inf_nom`='$admision_form_inf_nom',`admision_form_inf_ape`='$admision_form_inf_ape',`admision_form_inf_fech`='$admision_form_inf_fech',`admision_form_inf_telf`='$admision_form_inf_telf',`admision_form_inf_cid`='$admision_form_inf_cid' WHERE `departamento_id` = $departamento_id and `admision_form_id` = $admision_form_id"))
        {
            return true;
        } else {
            return false;
        }
    }
    function DelSolInformacion($solinformacion) {
        $departamento_id =  $this->departamento_id;
        $admision_form_id = $solinformacion->getAdmision_form_id();
        
        if($this->db->query("DELETE FROM `admision` WHERE `departamento_id` = $departamento_id and `admision_form_id` = $admision_form_id"))
        {
           return true; 
        } else {
           return false;
        }
    }
}