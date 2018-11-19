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
$valor =  $_POST ['swal-input25'];

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

  
$sql = "UPDATE reparar_tv set estado='Comprada',fecha_egreso=CURRENT_TIMESTAMP where id_equipo='$id_equipo';";
 $res = $conn->query($sql);

  $sql3 = "INSERT INTO traslado(estado, ubicacion, destino, id_equipo, id_folio, id_personal,tipo)
  VALUES ('Pendiente', 'Recepcion $sux', 'Almacen', '$id_equipo', '$id', '$var_clave','Compra');";
  $res3 = $conn->query($sql3);

 
//Generador de PDF
//inserccion
  //$n_nombre=$_POST['nombre'];
  //$a_apellido=$_POST['apellido'];
  

  require 'assets/fpdf/fpdf.php';
    $pdf = new FPDF();
    $pdf->AddPage();
    $title = utf8_decode('Compra de equipo');
    $pdf->SetTitle($title);
    $pdf->SetFont('Arial','B',24);
    $pdf->SetX(65);
    $pdf->Write(5,utf8_decode('Compra de equipo'));

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
    $pdf->Write(5,'En la venta de:');

    $pdf->SetFont('Arial','B',12);
    $pdf->SetXY(57,95);
    $pdf->Write(5,'Television');
  
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
  /*
  $pdf->SetFont('Arial','',12);
  $pdf->SetXY(17,110);
  $pdf->Write(5,utf8_decode('Número de serie:'));

  $pdf->SetFont('Arial','B',12);
  $pdf->SetXY(53,110);
  $pdf->Write(5,$serie);
*/
//Falla 
/*
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
*/
//costos 
$pdf->SetFont('Arial','',12);
$pdf->SetXY(17,115);
$pdf->Write(6,'Adquiriendo el equipo anterior con un valor de: $');

$pdf->SetFont('Arial','B',12);
$pdf->SetXY(113,115);
$pdf->Write(6,$valor);
 

//politicas 
$pdf->SetFont('Arial','',10);
$pdf->SetXY(17,182);
$pdf->Write(6,utf8_decode("Este documento declara que el cliente está de acuerdo con la venta de su televisión y ya no podrá reclamar
posteriormente despues de haber recibido el dinero y este documento. 

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