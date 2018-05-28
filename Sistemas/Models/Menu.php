<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Menu {

    private $menu_id;
    private $menu_item;
    private $menu_padre;
    private $menu_link;
    private $menu_aplicacion;
    
    function __construct() {
        
    }
    
    function getMenu_id() {
        return $this->menu_id;
    }

    function getMenu_item() {
        return $this->menu_item;
    }

    function getMenu_padre() {
        return $this->menu_padre;
    }

    function getMenu_link() {
        return $this->menu_link;
    }
    function getMenu_aplicacion() {
        return $this->menu_aplicacion;
    }

        function setMenu_id($menu_id) {
        $this->menu_id = $menu_id;
    }

    function setMenu_item($menu_item) {
        $this->menu_item = $menu_item;
    }

    function setMenu_padre($menu_padre) {
        $this->menu_padre = $menu_padre;
    }

    function setMenu_link($menu_link) {
        $this->menu_link = $menu_link;
    }
    function setMenu_aplicacion($menu_aplicacion) {
        $this->menu_aplicacion = $menu_aplicacion;
    }




}