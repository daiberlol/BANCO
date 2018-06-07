<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class SolInformacion {

    private $departamento_id;
    private $admision_form_id;
    private $admision_form_type = 'SOL.INFORMACION';
    private $admision_form_inf_nom;
    private $admision_form_inf_ape;
    private $admision_form_inf_fech;
    private $admision_form_inf_telf;
    private $admision_form_inf_cid;
    
    function __construct($departamento_id) {
        $this->departamento_id = $departamento_id;
    }
            
    function getDepartamento_id() {
        return $this->departamento_id;
    }

    function getAdmision_form_id() {
        return $this->admision_form_id;
    }

    function getAdmision_form_type() {
        return $this->admision_form_type;
    }

    function getAdmision_form_inf_nom() {
        return $this->admision_form_inf_nom;
    }

    function getAdmision_form_inf_ape() {
        return $this->admision_form_inf_ape;
    }

    function getAdmision_form_inf_fech() {
        return $this->admision_form_inf_fech;
    }

    function getAdmision_form_inf_telf() {
        return $this->admision_form_inf_telf;
    }

    function getAdmision_form_inf_cid() {
        return $this->admision_form_inf_cid;
    }

    function setAdmision_form_id($admision_form_id) {
        $this->admision_form_id = $admision_form_id;
    }

    function setAdmision_form_inf_nom($admision_form_inf_nom) {
        $this->admision_form_inf_nom = $admision_form_inf_nom;
    }

    function setAdmision_form_inf_ape($admision_form_inf_ape) {
        $this->admision_form_inf_ape = $admision_form_inf_ape;
    }

    function setAdmision_form_inf_fech($admision_form_inf_fech) {
        $this->admision_form_inf_fech = $admision_form_inf_fech;
    }

    function setAdmision_form_inf_telf($admision_form_inf_telf) {
        $this->admision_form_inf_telf = $admision_form_inf_telf;
    }

    function setAdmision_form_inf_cid($admision_form_inf_cid) {
        $this->admision_form_inf_cid = $admision_form_inf_cid;
    }



}