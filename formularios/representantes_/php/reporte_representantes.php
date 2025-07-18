<?php
require '../../../Libs/fpdf/fpdf.php';
require '../../../conexion/conexion.php';

$conexion = new Conexion();
$db = $conexion->getConexion();

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, 'REPORTE DE REPRESENTANTES', 0, 1, 'C');
$pdf->Ln(5);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 10, 'Fecha y hora del reporte: ' . date('d/m/Y H:i:s'), 0, 1, 'C');

$pdf->Ln(5);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(10, 10, '#', 1);
$pdf->Cell(30, 10, 'Codigo', 1);
$pdf->Cell(40, 10, 'Cedula', 1);
$pdf->Cell(110, 10, 'Apellidos y Nombres', 1);
$pdf->Ln();

$pdf->SetFont('Arial', '', 10);
$consulta = "SELECT REP_CODIGO, REP_CEDULA, REP_APENOM FROM spn_repr";
$sentencia = $db->prepare($consulta);
$sentencia->execute();

$contador = 1;
while ($fila = $sentencia->fetch()) {
    $pdf->Cell(10, 10, $contador++, 1);
    $pdf->Cell(30, 10, $fila['REP_CODIGO'], 1);
    $pdf->Cell(40, 10, $fila['REP_CEDULA'], 1);
    $pdf->Cell(110, 10, utf8_decode($fila['REP_APENOM']), 1);
    $pdf->Ln();
}

$pdf->Output();
?>
