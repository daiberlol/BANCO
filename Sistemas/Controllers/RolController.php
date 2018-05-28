<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class RolController {

    private $RolModel;
    
    function __construct() {
         require_once ('/../Models/Rol.php');
        require_once ('/../Models/RolModelo.php');
        $this->RolModel = new RolModelo();
    }
    
    function Buscar($rol_id) {
        return json_encode($this->RolModel->SearchRol($rol_id));
    }
    function Listar() {
        return $this->RolModel->Listrol();
    }
    function Agregar($rol_id,$rol_nombre) {
        $rol = new Rol();
        $rol->setRol_id($rol_id);
        $rol->setRol_nombre($rol_nombre);
        
        if($this->RolModel->AddRol($rol))
        {
            return "Rol agregado exitosamente";
        }else{
            return "¡Oops! hemos tenido un problema al intentar de agregar el registro";
        }
    }
    function Editar($rol_id,$rol_nombre) {
        $rol = new Rol();
        $rol->setRol_id($rol_id);
        $rol->setRol_nombre($rol_nombre);
        
        if($this->RolModel->EditRol($rol))
        {
            return "Rol editado exitosamente";
        }else
        {
            return "¡Oops! hemos tenido un problema al intentar de editar el registro";
        }
    }
    function Eliminar($rol_id) {
        if($this->RolModel->DeleteRol($rol_id))
        {
            return "Rol eliminado exitosamente";
        }else{
            return "¡Oops! hemos tenido un problema al intentar de eliminar el registro";
        }
    }
    
}