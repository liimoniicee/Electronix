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
  //falla
  $pdf->SetFont('Arial','',12);
  $pdf->SetXY(17,110);
  $pdf->Write(5,'Con la falla(s) de:');

  $pdf->SetFont('Arial','B',12);
  $pdf->SetXY(53,110);
  $pdf->Write(5,'FALLA');






    $pdf->Output();
?>