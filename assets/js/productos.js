//funcion para leer todos los productos registrados
function readRecords() {
    $.get("../models/readProducts.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}

//Función para agregar producto
function addProduct() {
    // Obtener valores
    var name = $("#name").val();
    var descripcion = $("#descripcion").val();
    var precio = $("#precio").val();
    var categoria = $("#categoria").val();
    //Paso de valor a entero, por posible error al insertar
    categoria = parseInt(categoria);
    jQuery.ajax({
        url: '../models/addProduct.php',
       type: 'post',
       data: {
        first_name: name,
        descripcion: descripcion,
        precio: precio,
        categoria: categoria}

    }).done(
             $(document).ready(function(){
            readRecords();
        })
            );


        $(document).ready(function(){
            readRecords();
        });
        // clear fields from the popup
        $("#add_new_product_modal").modal("hide");
        $("#name").val("");
        $("#descripcion").val("");
        $("#categoria").val("");
        $("#precio").val("");
}


//Eliminar producto
function DeleteUser(id) {
    var conf = confirm("Seguro que deseas eliminar el producto con id "+id);
    //$("#datos").html(matricula);
    if (conf == true) {
        $.post("../models/deleteProduct.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                readRecords();
            }
        );
    }
}


//Obtener datos de profesor
function GetUserDetails(id) {

    // Add User ID to the hidden field for furture usage
    $("#hidden_id_producto").val(id);
    $.post("../models/readProductDetails.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var producto = JSON.parse(data);
            //$("#datos").html('cedula: '+cedula+'holi ststus:'+status+' data:'+data);
            // Assing existing values to the modal popup fields
            //$("#datos2").html('Primer nombre:'+medic.nombre);
            $("#name_update").val(producto.nombre);
            $("#descripcion_update").val(producto.descripcion);
            $("#precio_update").val(producto.precio);
            $("#id_categoria_update").val(producto.categoria_id);
        }
    );
    // Open modal popup
    $("#update_product_modal").modal("show");
}

//Función para actulizar datos de alumno
function ActualizarDatosProducto() {
    // get values

    var name = $("#name_update").val();
    var descripcion = $("#descripcion_update").val();
    var precio = $("#precio_update").val();
    var categoria = $("#id_categoria_update").val();
    // get hidden field value
    var id = $("#hidden_id_producto").val();
    $("#datos").html(id);
    //$("#datos").html('probando');
    //$("#datos2").html('name_update: '+name+' cedula_oculta: '+cedula);
    // Update the details by requesting to the server using ajax
    $.post("../models/updateProductoDetails.php", {
            first_name: name,
            descripcion: descripcion,
            precio: precio,
            categoria: categoria,
            id: id
        },
        function (data, status) {
            // hide modal popup
            $("#update_product_modal").modal("hide");
            // reload Users by using readRecords();
            readRecords();
        }
    );
}

//Función para alumnos por grupo
function readCategoria(){
     var categoria = document.getElementById('categoria-search').value;
    //$("#datos").html(grupo);
    $.post("../models/readCategoria.php",{
        categoria: categoria
    },function(data,status){
        //Se envia la información encontrada (data) al div
        $(".records_content").html(data);
        //Se oculta el modal
        $("#ver-grupo").modal("hide");
        //Se limpia la caja de texto
        $("#categoria-search").val("");
    });
}
