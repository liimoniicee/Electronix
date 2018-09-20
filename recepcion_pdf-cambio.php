<?php   
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];

$id = $_POST ['swal-input0'];
$id_equipo = $_POST ['swal-input1'];
$nom = $_POST ['swal-input3'];
$ape= $_POST ['swal-input4'];
$equipo = $_POST ['swal-input6'];
$marca= $_POST ['swal-input7'];
$modelo = $_POST ['swal-input8'];
$serie = $_POST ['swal-input9'];
$falla= $_POST ['swal-input12'];

$idventa= $_POST ['tv_venta'];
$marca1= $_POST ['marca'];
$modelo1= $_POST ['modelo'];



$abono= $_POST ['swal-input21'];
$valor= $_POST ['swal-input50'];
$costo= $_POST ['costo'];
$restante= $_POST ['swal-input52'];




  


$sql = "UPDATE reparar_tv set estado='A cambio', ubicacion='Recepcion', costo_total='$costo' ,fecha_egreso=CURRENT_TIMESTAMP where id_folio='$id' and id_equipo='$id_equipo';";
 $res = $conn->query($sql);

 $sql1 = "UPDATE ventas_tv set estado='Vendida', costo='$restante',fecha_egreso=CURRENT_TIMESTAMP ,id_folio='$id' , idvendedor='$var_clave', ubicacion='Cliente', id_equipo='$id_equipo' where idventa_tv='$idventa';";
 $res1 = $conn->query($sql1);
 
//Generador de PDF
//inserccion
  //$n_nombre=$_POST['nombre'];
  //$a_apellido=$_POST['apellido'];
  

  require 'assets/fpdf/fpdf.php';
    $pdf = new FPDF();
    $pdf->AddPage();
    $title = utf8_decode('Garantía por cambio de equipo');
    $pdf->SetTitle($title);
    $pdf->SetFont('Arial','B',24);
    $pdf->SetX(45);
    $pdf->Write(5,utf8_decode('Garantía por cambio de equipo'));

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
    $pdf->SetXY(17,80);
    $pdf->Write(5,'Agradecemos la confianza a nuestro cliente:');

    $pdf->SetFont('Arial','B',12);
    $pdf->SetXY(102,80);
    $pdf->Write(5,$nom);

    $pdf->SetFont('Arial','B',12);
    $pdf->SetXY(145,80);
    $pdf->Write(5,$ape);

    //marca y modelo
    $pdf->SetFont('Arial','',12);
    $pdf->SetXY(17,95);
    $pdf->Write(5,'En la compra de:');

    $pdf->SetFont('Arial','B',12);
    $pdf->SetXY(57,95);
    $pdf->Write(5,'television');
    //marca
    $pdf->SetFont('Arial','',12);
    $pdf->SetXY(80,95);
    $pdf->Write(5,'marca:');

    $pdf->SetFont('Arial','B',12);
    $pdf->SetXY(95,95);
    $pdf->Write(5, $marca1);
    //modelo
    $pdf->SetFont('Arial','',12);
    $pdf->SetXY(125,95);
    $pdf->Write(5,'modelo:');

    $pdf->SetFont('Arial','B',12);
    $pdf->SetXY(145,95);
    $pdf->Write(5,$modelo1);
  //Número de serie
  /*
  $pdf->SetFont('Arial','',12);
  $pdf->SetXY(17,110);
  $pdf->Write(5,utf8_decode('Número de serie:'));

  $pdf->SetFont('Arial','B',12);
  $pdf->SetXY(53,110);
  $pdf->Write(5,$serie);
*/
//Falla 
  $pdf->SetFont('Arial','',12);
  $pdf->SetXY(17,110);
  $pdf->Write(5,'tomando a cambio su:');

  $pdf->SetFont('Arial','',12);
  $pdf->SetXY(70,110);
  $pdf->Write(5,'television');
//servicio y accesorios.
  $pdf->SetFont('Arial','',12);
  $pdf->SetXY(17,125);
  $pdf->Write(5,'marca:');

  $pdf->SetFont('Arial','B',12);
  $pdf->SetXY(45,125);
  $pdf->Write(5,$marca);

  $pdf->SetFont('Arial','',12);
  $pdf->SetXY(100,125);
  $pdf->Write(5,'modelo:');

  $pdf->SetFont('Arial','B',12);
  $pdf->SetXY(145,125);
  $pdf->Write(5,$modelo);

//costos 
$pdf->SetFont('Arial','',12);
$pdf->SetXY(17,140);
$pdf->Write(6,'Sumando su anticipo de: $');

$pdf->SetFont('Arial','B',12);
$pdf->SetXY(67,140);
$pdf->Write(6,$abono);

$pdf->SetFont('Arial','',12);
$pdf->SetXY(78,140);
$pdf->Write(6,utf8_decode('más el valor de su televisión: $'));

$pdf->SetFont('Arial','B',12);
$pdf->SetXY(140,140);
$pdf->Write(6,$valor);

$pdf->SetFont('Arial','',12);
$pdf->SetXY(17,155);
$pdf->Write(6,utf8_decode('que se resta al precio de la televisión en venta de: $'));

$pdf->SetFont('Arial','B',12);
$pdf->SetXY(115,155);
$pdf->Write(6,$costo);

$pdf->SetFont('Arial','',12);
$pdf->SetXY(17,170);
$pdf->Write(6,'dando total a pagar la cantidad de: $');

$pdf->SetFont('Arial','B',12);
$pdf->SetXY(86,170);
$pdf->Write(6,$restante);











//politicas 
$pdf->SetFont('Arial','',10);
$pdf->SetXY(17,182);
$pdf->Write(6,utf8_decode("Esta poliza de garantía solo es valida sobre la mano de obra, por lo tanto no aplica si su equipo 
falla por otra causa (Humedad, descargas eléctricas o golpes) la garantía comienza a partir de la fecha de emisión de 
la presente hasta los seis meses siguientes. 

"));




//footer :v
$pdf->SetFont('Arial','',12);
$pdf->SetXY(20,210);
$pdf->Write(6,utf8_decode("Sin mas por el momento queda de ustedes su seguro servidor Juan Jorge Díaz Ochoa."));

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


$pdf->Output();

?>