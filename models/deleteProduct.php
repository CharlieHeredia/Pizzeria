<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // include Database connection file
    $con = mysql_connect('localhost','root','');
    if (mysql_select_db(('pizzeria'), $con)==true) {

	}
    else{
        echo('nosepudo');
    }

    // get user id
    $producto_id = $_POST['id'];
    // delete User
    $query = "DELETE FROM producto WHERE id = '$producto_id'";
    if (!$result = mysql_query($query)) {
        exit(mysql_error($con));
    }
}
