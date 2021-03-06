﻿<?php   
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];

$id = $_POST ['swal-input00'];
$id_equipo = $_POST ['swal-input1'];

$nom = $_POST ['swal-input3'];
$ape= $_POST ['swal-input4'];
$equipo = $_POST ['swal-input6'];
$marca= $_POST ['swal-input7'];
$modelo = $_POST ['swal-input8'];
$serie = $_POST ['swal-input9'];
$falla= $_POST ['swal-input12'];


$sql = "UPDATE reparar_tv set estado='Devuelto', ubicacion='Cliente', costo_total='200' ,fecha_egreso=CURRENT_TIMESTAMP where id_equipo='$id_equipo';";
 $res = $conn->query($sql);


  

  require 'assets/fpdf/fpdf.php';
    $pdf = new FPDF();
    $pdf->AddPage();
    $title = utf8_decode("Devolución de equipo");
    $pdf->SetTitle($title);
    $pdf->SetFont('Arial','B',24);
    $pdf->SetX(60);
    $pdf->Write(5,utf8_decode("Orden de devolución"));

    $pdf->Image('assets/img/logo.jpg',17,25,66);
//folio
    $pdf->SetFont('Arial','',16);
    $pdf->SetXY(150,34);
    $pdf->Write(5,'Folio:');

    $pdf->SetFont('Arial','B',16);
    $pdf->SetXY(166,34);
    $pdf->Write(5,$id);

//fecha
    $pdf->SetFont('Arial','',16);
    $pdf->SetXY(148,48);
    $pdf->Write(5,'Fecha:');

    $pdf->SetFont('Arial','B',16);
    $pdf->SetXY(167,48);
    $pdf->Cell(30,5,date('d/m/Y'),0,1,'L');
//Cuerpo de texto
    //nombre y apellido
    $pdf->SetFont('Arial','',12);
    $pdf->SetXY(17,70);
    $pdf->Write(5,'Equipo devuelto con el folio:');

    $pdf->SetFont('Arial','B',12);
    $pdf->SetXY(70,70);
    $pdf->Write(5,$id_equipo);

    $pdf->SetFont('Arial','',12);
    $pdf->SetXY(17,85);
    $pdf->Write(5,'Agradecemos la confianza a nuestro cliente:');

    $pdf->SetFont('Arial','B',12);
    $pdf->SetXY(102,85);
    $pdf->Write(5,utf8_decode($nom));

    $pdf->SetFont('Arial','B',12);
    $pdf->SetXY(145,85);
    $pdf->Write(5,utf8_decode($ape));

    //marca y modelo
    $pdf->SetFont('Arial','',12);
    $pdf->SetXY(17,100);
    $pdf->Write(5,utf8_decode("Procediendo la devolución de:"));

    $pdf->SetFont('Arial','B',12);
    $pdf->SetXY(74,100);
    $pdf->Write(5,utf8_decode($equipo));
    //marca
    $pdf->SetFont('Arial','',12);
    $pdf->SetXY(100,100);
    $pdf->Write(5,'marca:');

    $pdf->SetFont('Arial','B',12);
    $pdf->SetXY(115,100);
    $pdf->Write(5,utf8_decode($marca));
    //modelo
    $pdf->SetFont('Arial','',12);
    $pdf->SetXY(130,100);
    $pdf->Write(5,'modelo:');

    $pdf->SetFont('Arial','B',12);
    $pdf->SetXY(146,100);
    $pdf->Write(5,utf8_decode($modelo));
  //Número de serie
  $pdf->SetFont('Arial','',12);
  $pdf->SetXY(17,115);
  $pdf->Write(5,utf8_decode("Número de serie:"));

  $pdf->SetFont('Arial','B',12);
  $pdf->SetXY(53,115);
  $pdf->Write(5,$serie);

//Falla 
  $pdf->SetFont('Arial','',12);
  $pdf->SetXY(17,130);
  $pdf->Write(5,'Con la(s) falla(s) de:');

  $pdf->SetFont('Arial','B',12);
  $pdf->SetXY(57,130);
  $pdf->Write(5,utf8_decode($falla));
//servicio y accesorios.
  $pdf->SetFont('Arial','',12);
  $pdf->SetXY(17,145);
  $pdf->Write(5,utf8_decode("Con un costo total de devolución: $"));

  $pdf->SetFont('Arial','B',12);
  $pdf->SetXY(84,145);
  $pdf->Write(5,'200.00');

  

//politicas 
$pdf->SetFont('Arial','',12);
$pdf->SetXY(17,170);
$pdf->Write(6,'Este documento declara que el cliente esta conciente que el equipo que esta siendo regresado 
  contiene todas sus partes. 

');

//footer :v
$pdf->SetFont('Arial','',12);
$pdf->SetXY(20,210);
$pdf->Write(6,'Sin mas por el momento quedamos a sus órdenes.');

//direccion
$pdf->SetFont('Arial','B',12);
$pdf->SetXY(90,225);
$pdf->Write(6,utf8_decode("Dirección"));

$pdf->SetFont('Arial','',12);
$pdf->SetXY(45,235);
$pdf->Write(6,utf8_decode("Prolongación Leona Vicario esquina con Lagunas de Montebello."));

$pdf->SetFont('Arial','',12);
$pdf->SetXY(55,245);
$pdf->Write(6,'Col. Lagunitas, Cabo San Lucas, Baja California Sur');

//contacto
$pdf->SetFont('Arial','B',12);
$pdf->SetXY(90,255);
$pdf->Write(6,'Contacto');

$pdf->SetFont('Arial','',12);
$pdf->SetXY(80,265);
$pdf->Write(6,'Cel: 624-176-33-02');

$pdf->SetFont('Arial','',12);
$pdf->SetXY(80,270);
$pdf->Write(6,'Oficina: 688-28-96');

$filename="assets\Documents/Devoluciones/Devolucion $id $modelo.pdf";
$pdf->Output($filename,'F');
$pdf->Output();

?>