<?php   
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

$idventa= $_POST ['tv_venta'];
$marca1= $_POST ['marca'];
$modelo1= $_POST ['modelo'];

$puntos= $_POST ['puntos'];


$abono= $_POST ['swal-input21'];
$valor= $_POST ['swal-input50'];
$costo= $_POST ['costo'];
$restante= $_POST ['swal-input52'];

$tipo= $_POST ['compra'];
$abono1= $_POST ['costo1'];

$puntos_por = $restante*.03;

$puntos_sum= "SELECT sum(puntos) total from puntos where id_folio ='$id';"; 


$recepcion ="SELECT r.colonia
FROM reparar_tv p, recepciones r
WHERE p.id_folio =$id
AND p.rec_id_recepcion = r.id_recepcion
ORDER BY fecha_ingreso desc";

 $resu = $conn->query($recepcion);
 if($resu->num_rows > 0){
 
  while($row = $resu->fetch_assoc()) {
    $sux   =  $row["colonia"];
   }
  }

  


$sql = "UPDATE reparar_tv set estado='A cambio', ubicacion='Recepcion', costo_total='$costo' ,fecha_egreso=CURRENT_TIMESTAMP where id_equipo='$id_equipo';";
 $res = $conn->query($sql);

 if($tipo=="Apartado"and $puntos=="0"){

  $sql1 = "UPDATE ventas_tv set estado ='Apartada' , costo='$restante', ubicacion='Pendiente traslado' ,fecha_egreso=CURRENT_TIMESTAMP ,idvendedor='$var_clave', id_folio='$id' , tipo='$tipo' , abono='$abono' id_equipo='$id_equipo' WHERE idventa_tv = '$idventa';";
  $res1 = $conn->query($sql1);

  $sql2 = "INSERT INTO traslado(estado, ubicacion, destino, id_equipo, id_folio, id_personal)
  VALUES ('Pendiente', 'Recepcion $sux', 'Almacen', '$id_equipo', '$id', '$var_clave');";
  $res2 = $conn->query($sql2);

  $puntosp= "UPDATE clientes, puntos set clientes.puntos='0', puntos.puntos='0' where clientes.id_folio =$id and puntos.id_folio=$id;";
  $res3 = $conn->query($puntosp);   
 
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
 if($tipo=="Contado" and $puntos=="0"){

  $sql2 = "UPDATE ventas_tv set estado='Vendida', costo='$restante',fecha_egreso=CURRENT_TIMESTAMP ,id_folio='$id' , idvendedor='$var_clave', ubicacion='Cliente', tipo='$tipo',id_equipo='$id_equipo' where idventa_tv='$idventa';";
  $res2 = $conn->query($sql2);

  $puntosp= "UPDATE clientes, puntos set clientes.puntos='0', puntos.puntos='0' where clientes.id_folio =$id and puntos.id_folio=$id;";
  $res3 = $conn->query($puntosp);   
 
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
    $pdf->Write(5,utf8_decode($nom));

    $pdf->SetFont('Arial','B',12);
    $pdf->SetXY(145,80);
    $pdf->Write(5,utf8_decode($ape));

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
  $pdf->Write(5,utf8_decode($marca));

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
$pdf->SetXY(87,140);
$pdf->Write(6,utf8_decode('más el valor de su televisión: $'));

$pdf->SetFont('Arial','B',12);
$pdf->SetXY(145,140);
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


    //tipo de compra
    $pdf->SetFont('Arial','',12);
    $pdf->SetXY(115,170);
    $pdf->Write(5,'tipo de compra:');

    $pdf->SetFont('Arial','B',12);
    $pdf->SetXY(145,170);
    $pdf->Write(5,$tipo);









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

$filename="assets\Documents/Garantia a cambio/Garantia a cambio $id $modelo.pdf";
$pdf->Output($filename,'F');
$pdf->Output();

?>