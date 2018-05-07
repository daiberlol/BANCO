<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UsuarioController {

    function __construct() {
        
    }
    
    function SearchUsu($name,$paw) {
        require_once ('./Sistemas/Models/Usuario.php');
        require_once ('./Sistemas/Models/UsuarioModelo.php');
        
        $usuarioModel = New UsuarioModelo();
        
        return $usuarioModel->SearchUsuario($name, $paw);
    }
    
    function AddUsuarios($nombre,$correo,$clave,$telefono) {
        require_once ('./Sistemas/Models/Usuario.php');
        require_once ('./Sistemas/Models/UsuarioModelo.php');
       
        $usuario = New Usuario();
        $usuarioModel = New UsuarioModelo();
        $usuario->setUsu_nombre($nombre);
        $usuario->setUsu_correo($correo);
        $usuario->setUsu_clave($clave);
        $usuario->setUsu_telefono($telefono);
        
        return $usuarioModel->Register($usuario);
    }
    
    function Login($name,$paw) {
        require_once ('./Sistemas/Models/Usuario.php');
        require_once ('./Sistemas/Models/UsuarioModelo.php');
        
        $usuarioModel = New UsuarioModelo();
        
        return $usuarioModel->Login($name, $paw);
    }

}