<?php
require_once("modelo.php");
$miclase = new clase_representantes();
$registros = $miclase->_consultartodo($_POST['valor']); 

echo "<table id='tabla' name='tabla' class='table table-bordered'>
        <thead class='bg-primary text-light text-center'>
            <tr>
                <th>#</th>
                <th>CODIGO</th>
                <th>CEDULA</th>
                <th>APELLIDOS Y NOMBRES</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>";

$f = 1;
while ($fila = $registros->fetch()) {
    $codigo = $fila['REP_CODIGO'];
    $cedula = $fila['REP_CEDULA'];
    $apenom = $fila['REP_APENOM'];

    echo "<tr>
            <td>$f</td>
            <td>$codigo</td>
            <td>$cedula</td>
            <td>$apenom</td>
            <td class='text-center'>
                <a href='editar.php?valor=$codigo'><img src='../../../Src/imgs/edit.png'></a>
            </td>
            <td class='text-center'>
                <img src='../../../Src/imgs/delete.png' 
                     style='cursor:pointer;' 
                     onclick=\"abrirModalEliminar('$codigo', '$cedula', '$apenom')\">
            </td>
          </tr>";
    $f++;
}

echo "</table>";
?>