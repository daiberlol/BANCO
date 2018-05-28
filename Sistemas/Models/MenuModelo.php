<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class MenuModelo{
    private $db;//almacena la conexion con la base de datos
    private $array;
    
    function __construct() {
        require_once ("/../../Configurations/Conectar.php");
        require_once ("/../Models/Menu.php");
        $this->db=conectar::conexion();
        $this->array = array();
    }
    
    function SearchMenu($menu_id) {
        $consulta = $this->db->query("SELECT * FROM `menu` WHERE `menu_id` = '$menu_id'");
        
        while($fila = $consulta->fetch(PDO::FETCH_ASSOC)){
            $menu = new Menu();
            $menu->setMenu_id($fila['menu_id']);
            $menu->setMenu_item($fila['menu_item']);
            $menu->setMenu_link($fila['menu_link']);
            $menu->setMenu_padre($fila['menu_padre']);
            $menu->setMenu_aplicacion($fila['menu_aplicacion']);
        }
        
        return $menu;
    }
    
    function ListMenu() {
        $consulta = $this->db->query("SELECT * FROM `menu`");
         while($fila = $consulta->fetch(PDO::FETCH_ASSOC)){
            $menu = new Menu();
            $menu->setMenu_id($fila['menu_id']);
            $menu->setMenu_item($fila['menu_item']);
            $menu->setMenu_link($fila['menu_link']);
            $menu->setMenu_padre($fila['menu_padre']);
            $menu->setMenu_aplicacion($fila['menu_aplicacion']);
            $this->array[] = $menu;
        }
        return $this->array;
    }
            
    function AddMenu($menu) {
        $menu_item = $menu->getMenu_item();
        $menu_link = $menu->getMenu_link();
        $menu_padre = $menu->getMenu_padre();
        $menu_aplicacion = $menu->getMenu_aplicacion();
        
        if($this->db->query("INSERT INTO `menu` (menu_item,menu_padre,menu_link,menu_aplicacion) VALUES ('$menu_item','$menu_padre','$menu_link','$menu_aplicacion')")){
            return true;
        }else
        {
            return false;
        }
    }
    
    function EditMenu($menu){
        $menu_id = $menu->getMenu_id();
        $menu_item = $menu->getMenu_item();
        $menu_link = $menu->getMenu_link();
        $menu_padre = $menu->getMenu_padre();
        $menu_aplicacion = $menu->getMenu_aplicacion();
        
        if($this->db->query("UPDATE `menu` SET `menu_item`='$menu_item',`menu_padre`='$menu_padre',`menu_link`='$menu_link',`menu_aplicacion` = '$menu_aplicacion' WHERE `menu_id` = $menu_id"))
        {
            return true;
        }else{
            return false;
        }
    }
    
    function DeleteMenu($menu_id) {
        
        if($this->db->query(("DELETE FROM `menu` WHERE `menu_id` = $menu_id")))
        {
            return true;
        }else{
            return false;
        }
        
    }
}