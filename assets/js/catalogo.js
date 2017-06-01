//Cuando cargue el documento, se llama a la función para leer los registros
$(document).ready(function () {
    // READ recods on page load
    readCategoria(); // calling function
    readCategoria2(); // calling function
    readCategoria3(); // calling function
});

//Función para cargar el menu por tipo de comida
function readCategoria(){
     var categoria = 1;
    //$("#datos").html(grupo);
    $.post("../models/readMenu.php",{
        categoria: categoria
    },function(data,status){
        //Se envia la información encontrada (data) al div
        $(".records_content").html(data);
        //Se oculta el modal
        //$("#ver-grupo").modal("hide");
        //Se limpia la caja de texto
        //$("#categoria-search").val("");
    });
}
//Función para cargar el menu por tipo de comida
function readCategoria2(){
     var categoria = 3;
    //$("#datos").html(grupo);
    $.post("../models/readMenu.php",{
        categoria: categoria
    },function(data,status){
        //Se envia la información encontrada (data) al div
        $(".records_content3").html(data);
        //Se oculta el modal
        //$("#ver-grupo").modal("hide");
        //Se limpia la caja de texto
        //$("#categoria-search").val("");
    });
}
//Función para cargar el menu por tipo de comida
function readCategoria3(){
     var categoria = 4;
    //$("#datos").html(grupo);
    $.post("../models/readMenu.php",{
        categoria: categoria
    },function(data,status){
        //Se envia la información encontrada (data) al div
        $(".records_content2").html(data);
        //Se oculta el modal
        //$("#ver-grupo").modal("hide");
        //Se limpia la caja de texto
        //$("#categoria-search").val("");
    });
}
