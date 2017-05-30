<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require 'conexion.php';
$con = conectar();

// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // get User ID
    $producto_id = $_POST['id'];

    // Get User Details
    $query = "SELECT * FROM producto WHERE id = '$producto_id'";
    if (!$result = mysql_query($query)) {
        exit(mysql_error($con));
    }
    $response = array();
    if(mysql_num_rows($result) > 0) {
        while ($row = mysql_fetch_assoc($result)) {
            $response = $row;
        }
    }
    else
    {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }
    // display JSON data
    echo json_encode($response);
}
else
{
    $response['status'] = 200;
    $response['message'] = "Invalid Request!";
}
