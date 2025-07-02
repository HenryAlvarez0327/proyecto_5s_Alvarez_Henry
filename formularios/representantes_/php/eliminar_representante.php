<link href="../../../Libs/sweetalert2-8.2.5/sweetalert.css" rel="stylesheet">
<script src="../../../Libs/jquery.min.js"></script>
<script src="../../../Libs/sweetalert2-8.2.5/sweetalert.min.js"></script>
<?php
require_once('modelo.php');

if (!empty($_POST['txt_codigo'])) {
    $obj = new clase_representantes();
    $result = $obj->_eliminar($_POST['txt_codigo']);

    if ($result) {
        echo '<script>jQuery(function(){swal({
            title:"Eliminar Representante", text:"Registro Eliminado", type:"success", confirmButtonText:"Aceptar"
        }, function(){location.href="../vistas/vista_crud_representantes.html";});});</script>';
    } else {
        echo '<script>jQuery(function(){swal({
            title:"Eliminar Representante", text:"Error al Eliminar", type:"error", confirmButtonText:"Aceptar"
        }, function(){location.href="../vistas/vista_crud_representantes.html";});});</script>';
    }
} else {
    echo '<script>jQuery(function(){swal({
        title:"Eliminar Representante", text:"Código no válido", type:"warning", confirmButtonText:"Aceptar"
    }, function(){location.href="../vistas/vista_crud_representantes.html";});});</script>';
}
?>