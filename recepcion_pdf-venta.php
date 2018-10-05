<?php
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];



$id = $_POST ['tv_venta'];

$nom = $_POST ['nombre'];
$ape= $_POST ['apellidos'];
$idventa = $_POST ['swal-input0'];
$marca= $_POST ['marc'];
$modelo = $_POST ['mod'];
$serie = $_POST ['ser'];
$costo_total= $_POST ['costo'];

$tipo = $_POST ['compra'];
$abono = $_POST ['costo1'];
$diahoy = date("Y-m-d");
$horahoy = date("H:i:s");




if($tipo == 'Apartado'){

  $sql1 = "UPDATE ventas_tv set estado ='Apartada' , ubicacion='Pendiente traslado' ,fecha_egreso=CURRENT_TIMESTAMP ,idvendedor='$var_clave', id_folio='$id' , tipo='$tipo' , abono='$abono' WHERE idventa_tv = '$idventa';";
  $res = $conn->query($sql1);


$sql4 = "INSERT into traslado(estado,ubicacion,destino,id_equipo,id_folio,tipo) VALUES('Pendiente','Recepcion','Almacen','$idventa','$id','Venta');";
$res4 = $conn->query($sql4);

}else{

   /*$ingreso = "INSERT INTO ingresos(fecha_ingreso) VALUES(CURRENT_TIMESTAMP)";
   $resul = $conn->query($ingreso);
   $consu = "select id_ingresos, fecha_ingreso from ingresos ORDER BY fecha_ingreso desc LIMIT 1";
   $resu = $conn->query($consu);
   if($resu->num_rows > 0){
    while($row = $resu->fetch_assoc()) {
      $idingreso   =  $row["id_ingresos"];
    }*/
  $sql2 = "UPDATE ventas_tv set estado ='Vendida' ,ubicacion='Cliente' ,fecha_egreso=CURRENT_TIMESTAMP ,idvendedor='$var_clave', id_folio='$id' , tipo='$tipo' ingresos_id_ingresos='$idingreso' WHERE idventa_tv = '$idventa';";
  $res2 = $conn->query($sql2);
//}


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
    $pdf->Write(5,utf8_decode("Garantía"));

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
    $pdf->SetXY(70,70);
    $pdf->Write(5,$idventa);

    $pdf->SetFont('Arial','',12);
    $pdf->SetXY(17,85);
    $pdf->Write(5,'Agradecemos la confianza a nuestro cliente:');

    $pdf->SetFont('Arial','B',12);
    $pdf->SetXY(102,85);
    $pdf->Write(5,$nom);

    $pdf->SetFont('Arial','B',12);
    $pdf->SetXY(145,85);
    $pdf->Write(5,$ape);

    //marca y modelo
    $pdf->SetFont('Arial','',12);
    $pdf->SetXY(17,100);
    $pdf->Write(5,utf8_decode("En la venta televisión"));

    $pdf->SetFont('Arial','B',12);
    $pdf->SetXY(57,100);
    $pdf->Write(5,'');
    //marca
    $pdf->SetFont('Arial','',12);
    $pdf->SetXY(60,100);
    $pdf->Write(5,'marca:');

    $pdf->SetFont('Arial','B',12);
    $pdf->SetXY(75,100);
    $pdf->Write(5,$marca );
    //modelo
    $pdf->SetFont('Arial','',12);
    $pdf->SetXY(125,100);
    $pdf->Write(5,'modelo:');

    $pdf->SetFont('Arial','B',12);
    $pdf->SetXY(145,100);
    $pdf->Write(5,$modelo);
  //Número de serie
  $pdf->SetFont('Arial','',12);
  $pdf->SetXY(17,115);
  $pdf->Write(5,utf8_decode("Número de serie:"));

  $pdf->SetFont('Arial','B',12);
  $pdf->SetXY(53,115);
  $pdf->Write(5,$serie);

//Falla

//servicio y accesorios.
  $pdf->SetFont('Arial','',12);
  $pdf->SetXY(17,130);
  $pdf->Write(5,'Con un costo total de: $');

  $pdf->SetFont('Arial','B',12);
  $pdf->SetXY(62,130);
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
