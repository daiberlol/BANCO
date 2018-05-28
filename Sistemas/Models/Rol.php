<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Rol {

    private $rol_id;
    private $rol_nombre;
    function __construct() {
        
    }
    
    function getRol_id() {
        return $this->rol_id;
    }

    function getRol_nombre() {
        return $this->rol_nombre;
    }

    function setRol_id($rol_id) {
        $this->rol_id = $rol_id;
    }

    function setRol_nombre($rol_nombre) {
        $this->rol_nombre = $rol_nombre;
    }


}