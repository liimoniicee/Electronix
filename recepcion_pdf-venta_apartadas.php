<?php   
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];

$id = $_POST ['folio'];
$idventa = $_POST ['idventa'];
$nom = $_POST ['nom'];
$ape= $_POST ['ape'];
$marca= $_POST ['marca'];
$modelo = $_POST ['modelo'];
$serie = $_POST ['serie'];
$costo_total= $_POST ['costo'];




$sql = "UPDATE ventas_tv set estado='Pendiente traslado', abono='0' ,fecha_egreso=CURRENT_TIMESTAMP where idventa_tv='$idventa';";
$res = $conn->query($sql);

$sql2 = "UPDATE traslado set estado='Pendiente', destino='Recepcion' where id_venta='$idventa';";
$res2 = $conn->query($sql2);

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
    $pdf->Write(5,'Equipo vendido con el folio:');

    $pdf->SetFont('Arial','B',12);
    $pdf->SetXY(80,70);
    $pdf->Write(5,$idventa);

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
    $pdf->Write(5,utf8_decode("En la compra de una television"));

    $pdf->SetFont('Arial','B',12);
    $pdf->SetXY(57,100);
    $pdf->Write(5,'');
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
/*
  $pdf->SetFont('Arial','',12);
  $pdf->SetXY(17,130);
  $pdf->Write(5,'Con la(s) falla(s) de:');

  $pdf->SetFont('Arial','B',12);
  $pdf->SetXY(60,130);
  $pdf->Write();
  */
//servicio y accesorios.
  $pdf->SetFont('Arial','',12);
  $pdf->SetXY(17,130);
  $pdf->Write(5,'Con un costo total de: $');

  $pdf->SetFont('Arial','B',12);
  $pdf->SetXY(62,130);
  $pdf->Write(5,$costo_total);

  

//politicas 
$pdf->SetFont('Arial','',12);
$pdf->SetXY(17,155);
$pdf->Write(6,utf8_decode("Este documento declara que la televisión que esta apartando el cliente será entregada hasta cumplir con el 
costo total de la misma, dicho equipo será almacenado, si al plazo en que se compromete en pagar no lo logra, 
se dejará de apartar su equipo y si pide la devolución de su dinero, se penalizará con el 20% que ha dado, en caso de querer adquirir otro equipo
no se penalizará y se dará de alta el nuevo equipo apartado/comprado."));

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

$filename="assets\Documents/Ventas apartadas/Venta apartada $id $modelo $idventa.pdf";
$pdf->Output($filename,'F');
$pdf->Output();
?>