<?php
require_once("modelo.php");
$obj = new clase_representantes();

$codigo = $_POST['txt_codigo'];
$cedula = $_POST['txt_cedula'];
$apenom = $_POST['txt_apenom'];
$fecnac = $_POST['txt_fecnac'];
$sexo = $_POST['rad_sexo'];
$estciv = $_POST['txt_estciv'];
$domici = $_POST['txt_domici'];
$teldom = $_POST['txt_teldom'];
$trabaj = $_POST['txt_trabaj'];
$dirtra = $_POST['txt_dirtra'];
$teltra = $_POST['txt_teltra'];
$profes = $_POST['txt_profes'];
$fecing = $_POST['txt_fecing'];
$suspen = $_POST['txt_suspen'];
$nacion = $_POST['txt_nacion'];
$correo = $_POST['txt_correo'];
$movilw = $_POST['txt_movilw'];
$contac = $_POST['txt_contac'];
$telcon = $_POST['txt_telcon'];
$observ = $_POST['txt_observ'];

$resultado = $obj->_actualizar($cedula, $apenom, $fecnac, $sexo, $estciv, $domici, $teldom, $trabaj, $dirtra, $teltra, $profes, $fecing, $suspen, $nacion, $correo, $movilw, $contac, $telcon, $observ, $codigo);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualización</title>
    <link rel="stylesheet" href="../../../Libs/sweetalert2-8.2.5/sweetalert.css">
    <script src="../../../Libs/jquery.min.js"></script>
    <script src="../../../Libs/sweetalert2-8.2.5/sweetalert.min.js"></script>
</head>
<body>
    <script>
        $(document).ready(function() {
            swal({
                title: "<?php echo $resultado ? 'Actualización' : 'Error'; ?>",
                text: "<?php echo $resultado ? 'Registro actualizado correctamente.' : 'Error al actualizar el registro.'; ?>",
                type: "<?php echo $resultado ? 'success' : 'error'; ?>",
                confirmButtonText: "Aceptar"
            }, function() {
                window.location.href = "../vistas/vista_crud_representantes.html";
            });
        });
    </script>
</body>
</html>
