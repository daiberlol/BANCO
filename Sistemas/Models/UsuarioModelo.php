<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UsuarioModelo {

    private $db; //almacena la conexion con la base de datos
    
    function __construct() {
        require_once ("./Configurations/Conectar.php");
        require_once ("./Sistemas/Models/Usuario.php");
        $this->db=conectar::conexion();
        
    }
    
    function SearchUsuario($usu,$pass) {
        $consulta = $this->db->query("select * from usu_usuario where usu_correo = '$usu' and usu_clave=md5('$pass')");
        
        while($fila = $consulta->fetch(PDO::FETCH_ASSOC)){
            $usuario = new Usuario();
            $usuario->setUsu_id($fila['usu_id']);
            $usuario->setUsu_nombre($fila['usu_nombre']);
            $usuario->setUsu_apellido($fila['usu_apellido']);
            $usuario->setUsu_telefono($fila['usu_telefono']);
            $usuario->setUsu_correo($fila['usu_correo']);
            $usuario->setUsu_clave($fila['usu_clave']);
            $usuario->setUsu_rol($fila['usu_rol']);
            $usuario->setUsu_estado($fila['usu_estado']);
            $usuario->setUsu_fecha_ingreso($fila['usu_fecha_ingreso']);
            
        }
        
        return $usuario;
    }
    
    function Login($usu,$pass) {
        $consulta = $this->db->query("select * from usu_usuario where usu_correo = '$usu' and usu_clave=md5('$pass')");
        $sw = 0;
        while($fila = $consulta->fetch(PDO::FETCH_ASSOC)){
            if($fila['usu_id'] != 0)
            {
                $sw = 1;
            }
            
        }
        return $sw;
    }
    
    function Register($usuario)
    {
        $nombre = $usuario->getUsu_nombre();
        $correo = $usuario->getUsu_correo();
        $clave = $usuario->getUsu_clave();
        $telefono = $usuario->getUsu_telefono();
        
        if($this->db->query("insert into usuario (nombre,correo,clave,telefono) values ('$nombre','$correo','$clave','$telefono')")){
            return true;
        }else{
            return false;
        }
        
    }

}