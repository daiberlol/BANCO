<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class MenuController {
    private $MenuModel;
    
    function __construct() {
        require_once ('/../Models/Menu.php');
        require_once ('/../Models/MenuModelo.php');
        $this->MenuModel = new MenuModelo();
    }

    function Buscar($menu_id) {
        return json_encode($this->MenuModel->SearchMenu($menu_id));
    }
    function Listar() {
        return $this->MenuModel->ListMenu();
    }
    function Agregar($menu_item,$menu_padre,$menu_link,$menu_aplicacion) {
        $menu = new Menu();
        $menu->setMenu_item($menu_item);
        $menu->setMenu_link($menu_link);
        $menu->setMenu_padre($menu_padre);
        $menu->setMenu_aplicacion($menu_aplicacion);
        
        
        if($this->MenuModel->AddMenu($menu))
        {
            return "Menu agregado exitosamente";
        }else{
            return "¡Oops! hemos tenido un problema al intentar de agregar el registro";
        }
        
    }
    function Editar($menu_id,$menu_item,$menu_padre,$menu_link,$menu_aplicacion) {
        $menu = new Menu();
        $menu->setMenu_id($menu_id);
        $menu->setMenu_item($menu_item);
        $menu->setMenu_link($menu_link);
        $menu->setMenu_padre($menu_padre);
        $menu->setMenu_aplicacion($menu_aplicacion);
        
        if($this->MenuModel->EditMenu($menu))
        {
            return "Menu editado exitosamente";
        }else
        {
            return "¡Oops! hemos tenido un problema al intentar de editar el registro";
        }
    }
    function Eliminar($menu_id) {
        if($this->MenuModel->DeleteMenu($menu_id))
        {
            return "Menu eliminado exitosamente";
        }else{
            return "¡Oops! hemos tenido un problema al intentar de eliminar el registro";
        }
    }
}