<?php
    require 'assets/fpdf/fpdf.php';
   
    $pdf = new FPDF();
    $pdf->AddPage();
    $title = 'Generar nueva orden de servicio';
    $pdf->SetTitle($title);
    $pdf->SetFont('Arial','B',24);
    $pdf->SetX(68);
    $pdf->Write(5,'Orden de Servicio');

    $pdf->Image('assets/img/logo.jpg',17,25,66);
//folio
    $pdf->SetFont('Arial','B',16);
    $pdf->SetXY(150,34);
    $pdf->Write(5,'Folio:');

    $pdf->SetFont('Arial','B',16);
    $pdf->SetXY(166,34);
    $pdf->Write(5,'xxxxxx');

//fecha
    $pdf->SetFont('Arial','B',16);
    $pdf->SetXY(148,48);
    $pdf->Write(5,'Fecha:');

    $pdf->SetFont('Arial','B',16);
    $pdf->SetXY(167,48);
    $pdf->Write(5,'xxxxxx');

//Cuerpo de texto
    //nombre y apellido
    $pdf->SetFont('Arial','',12);
    $pdf->SetXY(17,80);
    $pdf->Write(5,'Agradecemos la confianza a nuestro cliente:');

    $pdf->SetFont('Arial','B',12);
    $pdf->SetXY(102,80);
    $pdf->Write(5,'NOMBRE');

    $pdf->SetFont('Arial','B',12);
    $pdf->SetXY(145,80);
    $pdf->Write(5,'APELLIDOS');

    //marca y modelo
    $pdf->SetFont('Arial','',12);
    $pdf->SetXY(17,95);
    $pdf->Write(5,'En la reparacion de:');

    $pdf->SetFont('Arial','B',12);
    $pdf->SetXY(57,95);
    $pdf->Write(5,'EQUIPO');
    //marca
    $pdf->SetFont('Arial','',12);
    $pdf->SetXY(80,95);
    $pdf->Write(5,'marca:');

    $pdf->SetFont('Arial','B',12);
    $pdf->SetXY(95,95);
    $pdf->Write(5,'MARCA');
    //modelo
    $pdf->SetFont('Arial','',12);
    $pdf->SetXY(125,95);
    $pdf->Write(5,'modelo:');

    $pdf->SetFont('Arial','B',12);
    $pdf->SetXY(145,95);
    $pdf->Write(5,'MODELO');
  //Número de serie
  $pdf->SetFont('Arial','',12);
  $pdf->SetXY(17,110);
  $pdf->Write(5,'Numero de serie:');

  $pdf->SetFont('Arial','B',12);
  $pdf->SetXY(53,110);
  $pdf->Write(5,'#SERIE');

//Falla 
  $pdf->SetFont('Arial','',12);
  $pdf->SetXY(17,125);
  $pdf->Write(5,'Con la(s) falla(s) de:');

  $pdf->SetFont('Arial','B',12);
  $pdf->SetXY(60,125);
  $pdf->Write(5,'FALLA');
//servicio y accesorios.
  $pdf->SetFont('Arial','',12);
  $pdf->SetXY(17,140);
  $pdf->Write(5,'Con el servicio de:');

  $pdf->SetFont('Arial','B',12);
  $pdf->SetXY(55,140);
  $pdf->Write(5,'SERVICIO');

  $pdf->SetFont('Arial','',12);
  $pdf->SetXY(100,140);
  $pdf->Write(5,'accesorios que deja:');

  $pdf->SetFont('Arial','B',12);
  $pdf->SetXY(145,140);
  $pdf->Write(5,'ACCESORIOS');

//politicas 
$pdf->SetFont('Arial','',12);
$pdf->SetXY(17,170);
$pdf->Write(6,'No nos hacemos responsables por equipos olvidados, tanto como los que estan reparados y los
que no, en caso de ser un servicio a domicilio, no se le cobrara por la revision solo si reparamos
su equipo, en caso de que no desee una reparacion, se le cobrara $200.00 por el traslado');

//footer :v
$pdf->SetFont('Arial','',12);
$pdf->SetXY(20,210);
$pdf->Write(6,'Sin mas por el momento queda de ustedes su seguro servidor Juan Jorge Diaz Ochoa.');

//direccion
$pdf->SetFont('Arial','B',12);
$pdf->SetXY(90,225);
$pdf->Write(6,'Direccion');

$pdf->SetFont('Arial','',12);
$pdf->SetXY(45,235);
$pdf->Write(6,'Prolongacion Leona Vicario esquina con Lagunas de Montebello.');

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




  $pdf->Output();
?>