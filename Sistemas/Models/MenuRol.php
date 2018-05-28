<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class MenuRol {

    private $mrol_id;
    private $mrol_id_menu;
    private $mrol_id_rol;
    
    function __construct() {
        
    }

    function getMrol_id() {
        return $this->mrol_id;
    }

    function getMrol_id_menu() {
        return $this->mrol_id_menu;
    }

    function getMrol_id_rol() {
        return $this->mrol_id_rol;
    }

    function setMrol_id($mrol_id) {
        $this->mrol_id = $mrol_id;
    }

    function setMrol_id_menu($mrol_id_menu) {
        $this->mrol_id_menu = $mrol_id_menu;
    }

    function setMrol_id_rol($mrol_id_rol) {
        $this->mrol_id_rol = $mrol_id_rol;
    }


}