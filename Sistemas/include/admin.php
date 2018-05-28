<?php 
//CREO CONEXCION CON LA BASE DE DATOS
function conectar(){
date_default_timezone_set('America/Bogota');
/*
$mysqli = new mysqli('HOST','USUARIO','CONTRASEÑA','BD');
*/
$mysqli = new mysqli('localhost','root','usbw','web2',3307);
 if ($mysqli->connect_errno) {   
    // Podría ser conveniente mostrar algo interesante, aunque nosotros simplemente saldremos
    return 0;
 }else{
    return $mysqli;
 }
}

//CIERRO CONEXCION CON LA BASE DE DATOS
function cerrar($mysqli){
$mysqli->close();
}
// CREAR VALIDAR LOGIN EN LA PAGINA
function getMenu($rol_usuario){
$con = conectar();
$sw = 0 ;
$array = [];
$i=0;
$sql = "SELECT menu_id,menu_item,menu_padre,menu_link 
FROM menu, (SELECT mrol_id_menu as mrol FROM menu_rol where mrol_id_rol = $rol_usuario ) as mr
where menu_id = mr.mrol and menu_padre = 0;";
  if ($resultado = $con->query($sql)) {
   if ($resultado->num_rows != 0) {
    // recorro toda la consulta y saco cada registro
    while($row = $resultado->fetch_assoc()){
      // agrego cada registro a un array
       $array[$i]= $row;
	   $i++;
    }
   }
  }
  cerrar($con);
return json_encode($array);
}
function getSubmenu($id){
$con = conectar();
$sw = 0 ;
$array=[];
$i=0;
$sql = "SELECT menu_item,menu_link FROM menu where menu_padre = $id;";
  if ($resultado = $con->query($sql)) {
   if ($resultado->num_rows != 0) {
    // recorro toda la consulta y saco cada registro
    while($row = $resultado->fetch_assoc()){
      // agrego cada registro a un array
       $array[$i]= $row;
	   $i++;
    }
   }
  }
  cerrar($con);
return json_encode($array);	
}

//FUNCION PARA CREAR USUARIO NUEVOS SIN VALIDAR EXISTENCIA
function crear_usuario($nombre,$correo,$clave,$telefono){
$sql ="insert into usuario (nombre,correo,clave,telefono) values ('$nombre','$correo','$clave','$telefono') ";
$con = conectar();

if ($resultado = $con->query($sql)) {
 $sw = 1;
}else{
 $sw = 0;
}
cerrar($con);
return $sw;
	
}

//FUNCION PARA LISTAR LA INFORMACIÓN
function listar($campo,$tabla,$condicion){
  $con = conectar();
   $i=0;
   if($condicion==""){
     $condicion= "1=1";
   }
  $sql = "select $campo from $tabla where $condicion;";
	
  if ($resultado = $con->query($sql)) {
   if ($resultado->num_rows != 0) {
    // recorro toda la consulta y saco cada registro
    while($row = $resultado->fetch_assoc()){
      // agrego cada registro a un array
       $array[$i]= $row;

	   $i++;
    }
   }
  }
	cerrar($con);
  // codifico el array en json y lo mando 
 return json_encode($array);
}
function generarCodigo($longitud) {
 $key = '';
 $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
 $max = strlen($pattern)-1;
 for($i=0;$i < $longitud;$i++) {
	 $key .= $pattern{mt_rand(0,$max)};
 }
 return $key;
}
function InsertarCampos($fieldsBd,$valuesBd,$tabla){
        $con = conectar();
	      $fields = implode(',', $fieldsBd);
        $valuesField = implode(',', $valuesBd);
        $sql = "INSERT INTO $tabla ( $fields ) VALUES ( $valuesField ) ";
        $con->query($sql);
        cerrar($con);
        return $sql;

}
if(isset($_POST['opcion'])){
	$case = $_POST['opcion'];
switch ($case) {
   case 'addUser':
     $fieldsBd = [];
		 $valuesBd = [];
            // $_POST as usu_nombre => Martin 
 		  foreach ($_POST as $clave=>$valor){
        if($clave!='opcion'){
         array_push($fieldsBd,$clave);
         array_push($valuesBd,"'".$valor."'");
        }
			
      }

      array_push($fieldsBd,"usu_fecha_ingreso");
      array_push($valuesBd,"NOW()");
      $clave = generarCodigo(10);
      array_push($fieldsBd,"usu_clave");
      array_push($valuesBd,"'".$clave."'");

      InsertarCampos($fieldsBd,$valuesBd,'usu_usuario');
         break;
   case 'addRol':
        $fieldsBd = [];
        $valuesBd = [];
        array_push($fieldsBd,"rol_nombre");
        array_push($valuesBd,"'".$_POST['rol_nombre']."'");
         InsertarCampos($fieldsBd,$valuesBd,'rol');
         break;
   case 2:
         //echo "i=2";
         break;
 }
}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	


?>