  <link rel="stylesheet" type="text/css" href="assets/css/main.css">


 <script src="assets/js/sweetalert2.all.min.js"></script>
 <script src="assets/js/sweetalert2.js"></script>


<?php

require 'conexion.php';

$nom = $_POST['nom'];
$ape = $_POST['ape'];
$cor = $_POST['cor'];
$cel = $_POST['cel'];
$dire = $_POST['dire'];

$consu = "SELECT * FROM CLIENTES WHERE celular = $cel";

$resu = $conn->query($consu);

if($resu->num_rows > 0){
?>
<body>
<script>
  swal({
    type: 'error',
    title: 'Oops...',
    text: 'Ese celular pertenece a otro usuario Carnal!',

  }).then(function() {
  // Redirect the user
  window.location.href = "recepcion.php";
  console.log('The Ok Button was clicked.');
  });
</script>
</body>

<?php
header('recepcion.php');
}else{

  $sql = "INSERT INTO clientes (id_folio, nombre, apellidos, direccion, correo, celular, fecha, puntos)
  VALUES (NULL, '$nom', '$ape', '$dire', '$cor', '$cel', CURRENT_TIMESTAMP, '0');";



  $res = $conn->query($sql);



  if (!$res) {
     printf("Errormessage: %s\n", $conn->error);
  }
  else{
  $consu = "SELECT * FROM CLIENTES WHERE celular = $cel";

  $resu = $conn->query($consu);

  if($resu->num_rows > 0){

   while($row = $resu->fetch_assoc()) {
   $id  =  $row["id_folio"];
   $nom = $row["nombre"];
   $ape = $row["apellidos"];
   $cor = $row["correo"];
   $cel = $row["celular"];
   $dire = $row["direccion"];
   $fech = $row["fecha"];
   $pun = $row["puntos"];


  //aqui termina el while

  }
  }else{}


    ?>
    <body>
    <script type="text/javascript">
  var cel = <?php echo $cel ?>

    swal({
    title: 'Nueva orden de servicio',
    html:
    '<div class="card-body"> <form target="_blank" action="recepcion_pdf-orden.php" method="post" name="data" content="text/html; charset=utf-8" >'+

    '<input type="hidden" name="swal-input0" value="<?php echo $id ?>" id="swal-input0" class="form-control border-input" readonly >' +
    '<input type="hidden" name="swal-input1" value="<?php echo $nom ?>"  id="swal-input1" class="form-control border-input" readonly >' +
    '<input type="hidden" name="swal-input2" value="<?php echo $ape ?>" id="swal-input2" class="form-control border-input" readonly >' +


    '<div class="row">'+
    '<div class="col-md-6">'+
      '<div class="form-group">'+
            '<label>Equipo</label>'+
            '<select class="form-control form-control-sm" textalign="center" name="equipo" id="equipo"><option value="Television" >Televisión</option>'+
            '<option value="Ventiladores">Ventiladores</option>'+
            '<option value="Tarjeta madre">Tarjetas madre</option>'+
            '<option value="Audio">Audio</option>'+
            '<option value="Fuente de poder">Fuentes de poder</option>'+
            '</select>' +
        '</div>'+
    '</div>'+
    '<div class="col-md-6">'+
      '<div class="form-group">'+
            '<label>Marca</label>'+
            '<input type="text" name="marca" id="marca" maxlength="25" onkeyup="this.value = this.value.toUpperCase();" required class="form-control border-input">'+
        '</div>'+
    '</div>'+
    '</div>'+

    '<div class="row">'+
    '<div class="col-md-6">'+
      '<div class="form-group">'+
            '<label>Modelo</label>'+
            '<input type="text" name="modelo" id="modelo" maxlength="25" required class="form-control border-input">'+
        '</div>'+
    '</div>'+

    '<div class="col-md-6">'+
      '<div class="form-group">'+
            '<label>Falla</label>'+
            '<input type="text" name="falla" id="falla" onkeyup="this.value = this.value.toUpperCase();" maxlength="25" required class="form-control border-input">'+
        '</div>'+
    '</div>'+
    '</div>'+

    '<div class="row">'+
    '<div class="col-md-6">'+
      '<div class="form-group">'+
            '<label>Serie</label>'+
            '<input type="text" name="serie" id="serie" onkeyup="this.value = this.value.toUpperCase();" maxlength="25" required class="form-control border-input">'+
        '</div>'+
    '</div>'+

    '<div class="col-md-6">'+
      '<div class="form-group">'+
            '<label>Accesorios</label>'+
            '<input type="text" name="acce" id="acce" maxlength="25"  class="form-control border-input">'+
        '</div>'+
    '</div>'+
    '</div>'+

    '<div class="col-md-12">'+
    '<div class="form-group">'+
            '<label>Tipo de servicio</label>'+
            '<select class="form-control form-control-sm" text-align="center" required name="servicio" id="servicio"><option value="Reparacion">Reparación</option><option value="Domicilio">Domicilio</option><option value="Garantia">Garantía</option><option value="Compra">Compra</option><option value="Revisión5">Revisión</option></select>' +

            '<label>Comentarios</label>'+
            '<textarea type="text" name="comen" id="comen"  class="form-control border-input"></textarea>'+
        '</div>'+
    '</div>'+


    '<div class="col-md-12">'+
    '<Button type="submit" class= "btn btn-info btn-fill btn-wd">Registrar y generar reporte</Button>'+


    '</form></div>',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: '</form> Actualizar solicitud',
    cancelButtonClass: 'btn btn-danger btn-fill btn-wd',
    showConfirmButton: false,
    focusConfirm: false,
    buttonsStyling: false,
    reverseButtons: true
    })



    </script>

  </body>
  <?php
 }


}


?>
