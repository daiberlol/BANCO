<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class RolModelo {

    private $db;
    private $array;
    function __construct() {
        require_once ("/../../Configurations/Conectar.php");
        require_once ("/../Models/Rol.php");
        $this->db=conectar::conexion();
        $this->array = array();
    }
    
    function SearchRol($rol_id) {
        $consulta = $this->db->query("SELECT * FROM `rol` WHERE `rol_id` = $rol_id");
        while($fila = $consulta->fetch(PDO::FETCH_ASSOC)){
            $rol = new Rol();
            $rol->setRol_id($fila['rol_id']);
            $rol->getRol_nombre($fila['rol_nombre']);
            
        }
        return $rol;
    }
    
    function Listrol() {
        $consulta = $this->db->query("SELECT * FROM `rol`");
        while($fila = $consulta->fetch(PDO::FETCH_ASSOC)){
            $rol = new Rol();
            $rol->setRol_id($fila['rol_id']);
            $rol->setRol_nombre($fila['rol_nombre']);
            
            $this->array[] = $rol;
        }
        return $this->array;
    }
    
    function AddRol($rol) {
        $rol_id = $rol->getRol_id();
        $rol_nombre = $rol->getRol_nombre();
        
        if($this->db->query("INSERT INTO `rol`(`rol_id`, `rol_nombre`) VALUES ($rol_id,$rol_nombre)")){
            return true;
        }else{
            return false;
        }
    }
    
    function EditRol($rol) {
        $rol_id = $rol->getRol_id();
        $rol_nombre = $rol->getRol_nombre();
        
        if($this->db->query("UPDATE `rol` SET `rol_nombre`= '$rol_nombre' WHERE `rol_id` = $rol_id")){
            return true;
        }else{
            return false;
        }
    }
    
    function DeleteRol($rol_id) {
        if($this->db->query("DELETE FROM `rol` WHERE `rol_id` = $rol_id"))
        {
            return true;
        }else{
            return false;
        }
    }
}