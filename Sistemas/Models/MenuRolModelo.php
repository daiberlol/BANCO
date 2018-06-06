<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
define('__ROOT__', dirname(dirname(__FILE__)));

class MenuRolModel {
    
    private $db;//almacena la conexion con la base de datos
    private $array;
    private $rol_id;
    
    function __construct($rol_id) {
        require_once (__ROOT__."/../Configurations/Conectar.php");
        require_once (__ROOT__."/Models/MenuRol.php");
        $this->db=conectar::conexion();
        $this->array = array();
        $this->rol_id = $rol_id;
    }
    
    function SearchMenusByRol() {
        $consulta = $this->db->query('SELECT mnu.menu_id ,mnu.menu_item ,mnu.menu_padre ,mnu.menu_link,mnu.menu_aplicacion FROM `menu` as mnu INNER JOIN `menu_rol` as mrol ON mnu.menu_id = mrol.mrol_id_menu WHERE mnu.menu_padre = 0 and mrol.mrol_id_rol = '.$this->rol_id.'; ');
        return $consulta->fetchAll();
    }
    function SearchSubMenuByRol($menu_id) {
        $consulta = $this->db->query("SELECT menu_item,menu_link,menu_aplicacion FROM menu where menu_padre = $menu_id;");
        return $consulta->fetchAll();
    }
    function ListMenuRol() {
        $consulta = $this->db->query("SELECT * FROM `menu_rol` WHERE `mrol_id_rol` = $this->rol_id");
        while($fila = $consulta->fetch(PDO::FETCH_ASSOC))
        {
            $menurol = new MenuRol();
            $menurol->setMrol_id($fila['mrol_id']);
            $menurol->setMrol_id_menu($fila['mrol_id_menu']);
            $menurol->setMrol_id_rol($fila['mrol_id_rol']);
            $this->array[] = $menurol;
        }
        
        return json_encode($this->array);
    }
    function AddMenuRol($mrol_id_menu) {
        $mrol_id_rol = $this->rol_id;
        
        if($this->db->query("INSERT INTO `menu_rol`(`mrol_id_menu`, `mrol_id_rol`) VALUES ($mrol_id_menu,$mrol_id_rol)"))
        {
            return true;
        }else{
            return false;
        }
    }
    function DeleteMenuRol($mrol_id) {
        
        if($this->db->query("DELETE FROM `menu_rol` WHERE `mrol_id` = $mrol_id"))
        {
            return true;
        }else{
            return false;
        }
    }

}