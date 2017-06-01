<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require 'conexion.php';
$categoria = $_POST['categoria'];
$con = conectar();
    if (mysql_select_db(('pizzeria'), $con)==true) {

	}
    else{
        echo('nosepudo');
    }
    // Design initial table header
    $data = '<table class="table table-bordered table-striped">
                        <tr>
                          <th>No.</th>
                          <th>Nombre Producto</th>
                          <th>Descripción</th>
                          <th>Precio</th>
                          <th>Agregar a carrito</th>
                        </tr>';

    $query = "SELECT * FROM producto WHERE categoria_id ='$categoria' ";

    if (!$result = mysql_query($query)) {
        exit(mysql_error($con));
    }

    // if query results contains rows then featch those rows
    if(mysql_num_rows($result) > 0)
    {
        $number = 1;
        $contador = 0;
        while($row = mysql_fetch_assoc($result))
        {
            //Esta parte se llena con los campos de la tabla
            //<td>'.$row['campo de tabla'].'</td>
            (string)$id[$contador] = $row['id'];
            $enviar = $id[$contador];
            //$enviar = 'calzon';
            $enviar = '"'.$enviar.'"';
               //<?php echo $row['email'];>
            $data .= '<tr>
                <td>'.$number.'</td>
                <td>'.$row['nombre'].'</td>
                <td>'.$row['descripcion'].'</td>
                <td>'.$row['precio'].'</td>
                <td>
                    <button onclick=GetUserDetails('.$enviar.') class="btn btn-warning">Agregar a carrito</button>
                </td>
            </tr>';
            $number++;
            $contador++;
        }
    }
    else
    {
        // records now found
        $data .= '<tr><td colspan="6">¡No hay registros de productos!</td></tr>';
    }

    $data .= '</table>';

    echo $data;
