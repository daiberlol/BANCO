<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

define('__ROOT__', dirname(dirname(__FILE__)));

class SolInformacionController {

    private $SolInformacionModel;
    private $departamento_id;
    function __construct($departamento_id) {
        require_once ('/../Models/SolInformacion.php');
        require_once ('/../Models/SolInformacionModelo.php');
        $this->SolInformacionModel = new SolInformacionModelo($departamento_id);
        $this->departamento_id = $departamento_id;
    }
    
    function Listar() {
        return $this->SolInformacionModel->ListSolInformacion();
    }
    function Buscar($admision_form_id) {
        return $this->SolInformacionModel->SearchSolInformacion($admision_form_id);
    }
    function Agregar($admision_form_inf_ape,$admision_form_inf_cid,$admision_form_inf_fech,$admision_form_inf_nom,$admision_form_inf_telf) {
        
        $solinformacion = new SolInformacion($this->departamento_id);
        $solinformacion->setAdmision_form_inf_ape($admision_form_inf_ape);
        $solinformacion->setAdmision_form_inf_cid($admision_form_inf_cid);
        $solinformacion->setAdmision_form_inf_fech($admision_form_inf_fech);
        $solinformacion->setAdmision_form_inf_nom($admision_form_inf_nom);
        $solinformacion->setAdmision_form_inf_telf($admision_form_inf_telf);
        
        
        if($this->SolInformacionModel->AddSolInformacion($solinformacion)){
            return "Solicitud registrada correctamente";
        }else
        {
            return "¡Oops! hemos tenido un problema al intentar de agregar el registro";
        }
        
    }
    function Editar($admision_form_id,$admision_form_inf_ape,$admision_form_inf_cid,$admision_form_inf_fech,$admision_form_inf_nom,$admision_form_inf_telf) {
        
        $solinformacion = new SolInformacion($this->departamento_id);
        $solinformacion->setAdmision_form_id($admision_form_id);
        $solinformacion->setAdmision_form_inf_ape($admision_form_inf_ape);
        $solinformacion->setAdmision_form_inf_cid($admision_form_inf_cid);
        $solinformacion->setAdmision_form_inf_fech($admision_form_inf_fech);
        $solinformacion->setAdmision_form_inf_nom($admision_form_inf_nom);
        $solinformacion->setAdmision_form_inf_telf($admision_form_inf_telf);
        
        if($this->SolInformacionModel->EditSolInformacion($solinformacion)){
            return "Solicitud editada correctamente";
        }else
        {
            return "¡Oops! hemos tenido un problema al intentar de editar el registro";
        }
    }
    function Delete($admision_form_id) {
        if($this->Delete($admision_form_id))
        {
            return "Solicitud eliminado exitosamente";
        }else{
            return "¡Oops! hemos tenido un problema al intentar de eliminar el registro";
        }
    }
    
}