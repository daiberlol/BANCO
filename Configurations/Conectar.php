<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of conectar
 *
 */
class conectar{	
	public static function conexion(){
		
		try{
			$conexion = new PDO ('mysql:localhost=localhost;dbname=web2;','root','12345678');
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$conexion->exec("SET CHARACTER SET UTF8");
                        
		}catch(Exception $e){
			echo 'Database connection failed - ';
                        echo $e->getMessage();
                        exit;
		}
		return $conexion;
	}
}