<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//Conseguir conexion
 require 'conexion.php';

$cone = conectar();



        // get values
        $name = $_POST['first_name'];
        $descripcion = $_POST['descripcion'];
        $categoria = $_POST['categoria'];
        $precio = $_POST['precio'];

        $query = "INSERT INTO producto VALUES(0,'$name','$descripcion','$precio','$categoria')";
        if (!$result = mysql_query($query)) {
            exit(mysql_error($cone));
        }
        echo "1 Producto registrado!";
