﻿<?php   
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];

$id = $_POST ['id_folio'];
$id_equipo = $_POST ['swal-input1'];
$nom = $_POST ['swal-input3'];
$ape= $_POST ['swal-input4'];
$equipo = $_POST ['swal-input6'];
$marca= $_POST ['swal-input7'];
$modelo = $_POST ['swal-input8'];
$serie = $_POST ['swal-input9'];
$falla= $_POST ['swal-input12'];
$costo_total= $_POST ['swal-input23'];

$puntos= $_POST ['puntos'];

$puntos_por = $costo_total*.03;


$sql = "UPDATE reparar_tv set estado='Entregado', ubicacion='Cliente', restante='0' ,fecha_egreso=CURRENT_TIMESTAMP where id_equipo='$id_equipo';";
 $res = $conn->query($sql);

 $puntos_sum= "SELECT sum(puntos) total from puntos where id_folio ='$id';"; 

 if($puntos=="0"){

  $puntosp= "UPDATE clientes, puntos set clientes.puntos='0', puntos.puntos='0' where clientes.id_folio =$id and puntos.id_folio=$id;";
  $res1 = $conn->query($puntosp);   
 
  $sql2 ="INSERT into puntos (puntos,id_folio,id_equipo) values('$puntos_por','$id','$id_equipo');";
  $res2 = $conn->query($sql2);  
 
  $resu = $conn->query($puntos_sum);
    if($resu->num_rows > 0){
 
    while($row = $resu->fetch_assoc()) {
      $punto_tot   =  $row["total"];
     }
    }

  $sql3 ="UPDATE clientes SET puntos=$punto_tot WHERE id_folio='$id';";
  $res3 = $conn->query($sql3);

}else{
 
$sql4 ="INSERT into puntos (puntos,id_folio,id_equipo) values('$puntos_por','$id','$id_equipo');";
$res4 = $conn->query($sql4);

$resu = $conn->query($puntos_sum);
 if($resu->num_rows > 0){
 
    while($row = $resu->fetch_assoc()) {
      $punto_tot   =  $row["total"];
     }
    }

$sql5 ="UPDATE clientes SET puntos=$punto_tot WHERE id_folio='$id';";
$res5 = $conn->query($sql5);

}



//checar la validacion(no funciona el else:v)



//Generador de PDF
//inserccion
  //$n_nombre=$_POST['nombre'];
  //$a_apellido=$_POST['apellido'];
  

  require 'assets/fpdf/fpdf.php';
    $pdf = new FPDF();
    $pdf->AddPage();
    $title = utf8_decode('Generar nueva garantía');
    $pdf->SetTitle($title);
    $pdf->SetFont('Arial','B',24);
    $pdf->SetX(80);
    $pdf->Write(5,utf8_decode("Garantia"));

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
    $pdf->Write(5,'Equipo reparado con el folio:');

    $pdf->SetFont('Arial','B',12);
    $pdf->SetXY(80,70);
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
    $pdf->Write(5,utf8_decode("En la reparación de:"));

    $pdf->SetFont('Arial','B',12);
    $pdf->SetXY(57,100);
    $pdf->Write(5,utf8_decode($equipo));
    //marca
    $pdf->SetFont('Arial','',12);
    $pdf->SetXY(80,100);
    $pdf->Write(5,'marca:');

    $pdf->SetFont('Arial','B',12);
    $pdf->SetXY(95,100);
    $pdf->Write(5,utf8_decode($marca));
    //modelo
    $pdf->SetFont('Arial','',12);
    $pdf->SetXY(125,100);
    $pdf->Write(5,'modelo:');

    $pdf->SetFont('Arial','B',12);
    $pdf->SetXY(145,100);
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
  $pdf->SetXY(60,130);
  $pdf->Write(5,utf8_decode($falla));
//servicio y accesorios.
  $pdf->SetFont('Arial','',12);
  $pdf->SetXY(17,145);
  $pdf->Write(5,'Con un costo total de: $');

  $pdf->SetFont('Arial','B',12);
  $pdf->SetXY(62,145);
  $pdf->Write(5,$costo_total);

  

//politicas 
$pdf->SetFont('Arial','',12);
$pdf->SetXY(17,170);
$pdf->Write(6,utf8_decode("Esta poliza de garantía solo es valida sobre la mano de obra, por lo tanto no aplica si su equipo 
falla por otra causa (Humedad, descargas eléctricas o golpes) la garantía comienza a partir de la fecha de emisión de la presente hasta los 
seis meses siguientes. 

"));

$pdf->SetFont('Arial','',12);
$pdf->SetXY(20,210);
$pdf->Write(6,utf8_decode("Sin mas por el momento quedamos a sus órdenes."));

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

$filename="assets\Documents/Garantia/Garantia $id $modelo.pdf";
$pdf->Output($filename,'F');
$pdf->Output();
?>