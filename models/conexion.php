<?php

/*Parte del sistema donde se realiza la conexion con la base de datos*/
//FUNCIÓN PARA REALIZAR LA CONEXION CON LA BASE DE DATOS
function conectar(){
//CONEXION CON LA BASE DE DATOS
$con = mysql_connect('localhost','root','') or die(mysql_error());
//SI LA CONEXION CON EL SERVIDOR TUVO EXITO ENTRA EN LA FUNCIÓN
if($con){
	//SENTENCIA MYSQL PARA LA SELECCIÓN DE LA BASE DE DATOS
    mysql_select_db('pizzeria',$con);
    //REGRESO DE LA CONEXION EXTABLECIDA
    return $con;

}else{
	//EN CASO DE HABER FALLADO LA CONEXION REGRESA '-1'
    return(-1);
}

}
?>
