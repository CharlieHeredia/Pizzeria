<?php

if( isset($_POST['funcion']) ) {
	require_once("../models/Product.php");
	require_once("../models/Cleaner.php");

	//echo 'Hola AJAX '.$_POST['funcion'];
	$productos = json_decode($_POST['productos']);

	foreach ($productos as $item) {
		$nombre = Cleaner::cleanInput($item->_nombre);
		$categoria = (int)Cleaner::cleanInput($item->_categoria);
		$producto = new Product($nombre,
														$item->_precio,
														$categoria,
														$item->_descripcion);
		$producto->save();
	}

} else {
	include_once("models/Product.php");
	$productos = Product::get();
}
