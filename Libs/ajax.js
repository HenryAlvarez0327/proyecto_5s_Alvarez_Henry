function ajax_buscar_representantes(vldato)
{
    var fd= new FormData();
    fd.append('valor', vldato);
    $.ajax({
        type: 'POST',
        url: '../php/buscar_representantes.php',
        data:fd,
        cache:false,
        contentType:false,
        processData:false
    })
    .done(function(data){
        $("#tabla").html(data);
    })
    .fail(function ()
    {
        alert("error al procesar la informacion");
    });
    return false;
}
function ajax_eli_representante(vldato) {
    $("#txt_codigo").val(vldato);
    
    var fd = new FormData();
    fd.append('codigo', vldato);
    $.ajax({
        type: 'POST',
        url: '../php/verdatos.php',
        data: fd,
        cache: false,
        contentType: false,
        dataType: 'json',
        processData: false
    })
        .done(function (datos) {
                    
            $("#txt_cedula").val(datos.cedula_ok);
            $("#txt_apenom").val(datos.apenom_ok);
           
        })
        .fail(function () {
            alert("Error al procesar la informacion");
        });
    return false;
}