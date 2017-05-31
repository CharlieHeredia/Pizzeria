<?php
session_start();
$_SESSION['UsuarioReady']='true';
if( isset($_POST['funcion']) ) {
	require_once("../models/Cliente.php");
	require_once("../models/Cleaner.php");

	//echo 'Hola AJAX '.$_POST['funcion'];
	$clientes = json_decode($_POST['clientes']);

	foreach ($clientes as $item) {
		$nombre = Cleaner::cleanInput($item->_nombre);
		$cliente = new Client($nombre,
														$item->_direccion,
														$item->_telefono);

		$cliente->save();
	}

} else {
	include_once("models/Cliente.php");
	$productos = Client::get();
}
