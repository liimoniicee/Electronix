<?php
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];

$id = $_POST ['swal-input0'];
$nom = $_POST ['swal-input1'];
$ape= $_POST ['swal-input2'];


  $equipo=$_POST['equipo'];
  $marca=$_POST['marca'];
  $modelo=$_POST['modelo'];
  $falla=$_POST['falla'];
  $serie=$_POST['serie'];
  $servicio=$_POST['servicio'];
 $accesorio=$_POST['acce'];
 $comentario=$_POST['comen'];

//checar la validacion(no funciona el else:v)
if($servicio=="Compra"){

  $sql = "INSERT INTO reparar_tv(equipo, marca, modelo, serie,accesorios, falla, comentarios, servicio, estado,ubicacion, id_folio)
  VALUES ('$equipo', '$marca', '$modelo', '$serie','$accesorio', '$falla', '$comentario', '$servicio', 'Pendiente traslado','Recepcion', '$id');";
  $res = $conn->query($sql);
 
 
 $consu = "select id_equipo, fecha_ingreso from reparar_tv ORDER BY fecha_ingreso desc LIMIT 1";
 $resu = $conn->query($consu);
 if($resu->num_rows > 0){
 
  while($row = $resu->fetch_assoc()) {
    $idequipo   =  $row["id_equipo"];
   }
   $sql2 = "INSERT INTO traslado(estado, comentarios, ubicacion, destino, id_equipo, id_folio, personal_id_personal)
   VALUES ('Pendiente', '$comentario', 'recepcion', 'almacen', '$idequipo', '$id', '$var_clave');";
   $res2 = $conn->query($sql2);
 
   $sql3 = "INSERT INTO avisos(id_personal, fecha, aviso, estado, tipo)
   VALUES ('$var_clave', current_time, 'Equipo nuevo en recepcion, pasa a recojer', 'Pendiente', 'Traslados');";
   $res3 = $conn->query($sql3);

  }

}else{


 $sql = "INSERT INTO reparar_tv(equipo, marca, modelo, serie,accesorios, falla, comentarios, servicio, estado,ubicacion, id_folio)
 VALUES ('$equipo', '$marca', '$modelo', '$serie','$accesorio', '$falla', '$comentario', '$servicio', 'Pendiente traslado','Recepcion', '$id');";
 $res = $conn->query($sql);


$consu = "select id_equipo, fecha_ingreso from reparar_tv ORDER BY fecha_ingreso desc LIMIT 1";
$resu = $conn->query($consu);
if($resu->num_rows > 0){

 while($row = $resu->fetch_assoc()) {
   $idequipo   =  $row["id_equipo"];
  }
  $sql2 = "INSERT INTO traslado(estado, comentarios, ubicacion, destino, id_equipo, id_folio, personal_id_personal)
  VALUES ('Pendiente', '$comentario', 'recepcion', 'Taller', '$idequipo', '$id', '$var_clave');";
  $res2 = $conn->query($sql2);

  $sql3 = "INSERT INTO avisos(id_personal, fecha, aviso, estado, tipo)
  VALUES ('$var_clave', current_time, 'Equipo nuevo en recepcion, pasa a recojer', 'Pendiente', 'Traslados');";
  $res3 = $conn->query($sql3);
}
}

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
    $pdf->Write(5,utf8_decode($nom));

    $pdf->SetFont('Arial','B',12);
    $pdf->SetXY(145,80);
    $pdf->Write(5,utf8_decode($ape));

    //marca y modelo
    $pdf->SetFont('Arial','',12);
    $pdf->SetXY(17,95);
    $pdf->Write(5,'En la reparacion de:');

    $pdf->SetFont('Arial','B',12);
    $pdf->SetXY(57,95);
    $pdf->Write(5,$equipo);
    //marca
    $pdf->SetFont('Arial','',12);
    $pdf->SetXY(80,95);
    $pdf->Write(5,'marca:');

    $pdf->SetFont('Arial','B',12);
    $pdf->SetXY(95,95);
    $pdf->Write(5, $marca);
    //modelo
    $pdf->SetFont('Arial','',12);
    $pdf->SetXY(125,95);
    $pdf->Write(5,'modelo:');

    $pdf->SetFont('Arial','B',12);
    $pdf->SetXY(145,95);
    $pdf->Write(5,$modelo);
  //Número de serie
  $pdf->SetFont('Arial','',12);
  $pdf->SetXY(17,110);
  $pdf->Write(5,'Numero de serie:');

  $pdf->SetFont('Arial','B',12);
  $pdf->SetXY(53,110);
  $pdf->Write(5,$serie);

//Falla
  $pdf->SetFont('Arial','',12);
  $pdf->SetXY(17,125);
  $pdf->Write(5,'Con la(s) falla(s) de:');

  $pdf->SetFont('Arial','B',12);
  $pdf->SetXY(60,125);
  $pdf->Write(5,$falla);
//servicio y accesorios.
  $pdf->SetFont('Arial','',12);
  $pdf->SetXY(17,140);
  $pdf->Write(5,'Con el servicio de:');

  $pdf->SetFont('Arial','B',12);
  $pdf->SetXY(55,140);
  $pdf->Write(5,$servicio);

  $pdf->SetFont('Arial','',12);
  $pdf->SetXY(100,140);
  $pdf->Write(5,'accesorios que deja:');

  $pdf->SetFont('Arial','B',12);
  $pdf->SetXY(145,140);
  $pdf->Write(5,$accesorio);

//politicas
$pdf->SetFont('Arial','',12);
$pdf->SetXY(17,170);
$pdf->Write(6,'No nos hacemos responsables por equipos olvidados, tanto como los que estan reparados y los
que no, en caso de ser un servicio a domicilio, no se le cobrara por la revision solo si reparamos
su equipo, en caso de que no desee una reparacion, se le cobrara $200.00 por el traslado');

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
