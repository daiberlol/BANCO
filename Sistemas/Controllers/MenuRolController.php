<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class MenuRolController {

    private $MenuRolModel;
    
    function __construct($mrol_id_rol) {
        require_once ('../Models/MenuRol.php');
        require_once ('../Models/MenuRolModelo.php');
        $this->MenuRolModel = new MenuRolModel($mrol_id_rol);
    }
    
    function Listar() {
        return json_encode($this->MenuRolModel->ListMenuRol());
    }
    
    function Buscar() {
        return json_encode($this->MenuRolModel->SearchMenusByRol());
    }
    function BuscarSubMenu($menu_id) {
        return json_encode($this->MenuRolModel->SearchSubMenuByRol($menu_id));
    }
    function Agregar($mrol_id_menu) {
        
        if($this->MenuRolModel->AddMenuRol($mrol_id_menu))
        {
            return "Menu asociado exitosamente";
        }else{
            return "¡Oops! hemos tenido un problema al intentar de asociar el registro";
        }
    }
    
    function Eliminar($mrol_id) {
        if($this->MenuRolModel->DeleteMenuRol($mrol_id))
        {
            return "Asociacion eliminado exitosamente";
        }else{
            return "¡Oops! hemos tenido un problema al intentar de eliminar la asociacion";
        }
    }
}