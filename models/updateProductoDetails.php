<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require 'conexion.php';
$con = conectar();

// check request
if(isset($_POST))
{
    // get values
    $name = $_POST['first_name'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $categoria = $_POST['categoria'];
    $id = $_POST['id'];

    // Updaste User details
    $query = "UPDATE producto SET nombre = '$name', descripcion = '$descripcion', precio = '$precio', categoria_id = '$categoria' WHERE id = '$id'";
    if (!$result = mysql_query($query)) {
        exit(mysql_error($con));
    }

}
