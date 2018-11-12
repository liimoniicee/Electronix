<?php
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];

$id = $_POST['swal-input0'];
$idventa = $_POST['idventa'];
$abo = $_POST['swal-input4'];
$abot = $_POST['swal-input5'];
$nom = $_POST['nom'];
$ape = $_POST['ape'];


$sql = "UPDATE ventas_tv set abono='$abot' where idventa_tv='$idventa'";

$res = $conn->query($sql);




/*
if (!$res) {
   printf("Errormessage: %s\n", $conn->error);
}
else{
  echo "<script>alert('Abono agregado al cliente con el folio=$$id')</script>";
  echo "<script>window.open('recepcion.php','_self')</script>";}
*/
require 'assets/fpdf/fpdf.php';
$pdf = new FPDF('P','mm',array(160,120));
$pdf->AddPage();
$title = utf8_decode('Comprobante de pago');
$pdf->SetTitle($title);
$pdf->SetFont('Arial','B',20);
$pdf->SetXY(20,5);
$pdf->Write(5,utf8_decode("Comprobante de pago"));

$pdf->Image('assets/img/logo.jpg',10,12,50);
//folio
$pdf->SetFont('Arial','',16);
$pdf->SetXY(60,20);
$pdf->Write(5,'Folio cliente:');

$pdf->SetFont('Arial','B',16);
$pdf->SetXY(95,20);
$pdf->Write(5,$id);

//fecha
$pdf->SetFont('Arial','',15);
$pdf->SetXY(65,134);
$pdf->Write(5,'Fecha:');

$pdf->SetFont('Arial','B',15);
$pdf->SetXY(85,134);
$pdf->Cell(30,5,date('d/m/Y'),0,1,'L');
//Cuerpo de texto
//nombre y apellido
$pdf->SetFont('Arial','',16);
$pdf->SetXY(60,30);
$pdf->Write(5,'Id venta:');

$pdf->SetFont('Arial','B',16);
$pdf->SetXY(85,30);
$pdf->Write(5,$idventa);

$pdf->SetFont('Arial','',18);
$pdf->SetXY(15,60);
$pdf->Write(5,'Nombre(s):');

$pdf->SetFont('Arial','B',18);
$pdf->SetXY(50,60);
$pdf->Write(5,utf8_decode($nom));

$pdf->SetFont('Arial','',18);
$pdf->SetXY(15,80);
$pdf->Write(5,'Apellidos:');

$pdf->SetFont('Arial','B',18);
$pdf->SetXY(50,80);
$pdf->Write(5,utf8_decode($ape));

//cantidad
$pdf->SetFont('Arial','',18);
$pdf->SetXY(15,100);
$pdf->Write(5,'Cantidad que abona: $');

$pdf->SetFont('Arial','B',18);
$pdf->SetXY(80,100);
$pdf->Write(5,$abo);

//footer
$pdf->SetFont('Arial','',18);
$pdf->SetXY(30,120);
$pdf->Write(5,utf8_decode('Electronica RSH'));

$pdf->Output();

?>