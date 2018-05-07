<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Usuario{
    private $usu_id;
    private $usu_nombre;
    private $usu_apellido;
    private $usu_telefono;
    private $usu_correo;
    private $usu_clave;
    private $usu_rol;
    private $usu_estado;
    private $usu_fecha_ingreso;
    
    
    function __construct() {
        
    }
    
    function getUsu_id() {
        return $this->usu_id;
    }

    function getUsu_nombre() {
        return $this->usu_nombre;
    }

    function getUsu_apellido() {
        return $this->usu_apellido;
    }

    function getUsu_telefono() {
        return $this->usu_telefono;
    }

    function getUsu_correo() {
        return $this->usu_correo;
    }

    function getUsu_clave() {
        return $this->usu_clave;
    }

    function getUsu_rol() {
        return $this->usu_rol;
    }

    function getUsu_estado() {
        return $this->usu_estado;
    }

    function getUsu_fecha_ingreso() {
        return $this->usu_fecha_ingreso;
    }

    function setUsu_id($usu_id) {
        $this->usu_id = $usu_id;
    }

    function setUsu_nombre($usu_nombre) {
        $this->usu_nombre = $usu_nombre;
    }

    function setUsu_apellido($usu_apellido) {
        $this->usu_apellido = $usu_apellido;
    }

    function setUsu_telefono($usu_telefono) {
        $this->usu_telefono = $usu_telefono;
    }

    function setUsu_correo($usu_correo) {
        $this->usu_correo = $usu_correo;
    }

    function setUsu_clave($usu_clave) {
        $this->usu_clave = $usu_clave;
    }

    function setUsu_rol($usu_rol) {
        $this->usu_rol = $usu_rol;
    }

    function setUsu_estado($usu_estado) {
        $this->usu_estado = $usu_estado;
    }

    function setUsu_fecha_ingreso($usu_fecha_ingreso) {
        $this->usu_fecha_ingreso = $usu_fecha_ingreso;
    }


    
}