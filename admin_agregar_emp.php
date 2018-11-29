<link rel="stylesheet" type="text/css" href="assets/css/main.css">


<script src="assets/js/sweetalert2.all.min.js"></script>
<script src="assets/js/sweetalert2.js"></script>


<?php

require 'conexion.php';
$tipo = $_POST['tipo'];
$nom = $_POST['nom'];
$ape = $_POST['ape'];
$cor = $_POST['cor'];
$cel = $_POST['cel'];
$usu = $_POST['usu'];
$suc = $_POST['sucu'];
$hora = $_POST['hra_r'];
$hora_e = $_POST['hra_e'];
$hora_s = $_POST['hra_s'];


$pass = md5($_POST['pass']);

$consu = "SELECT * FROM personal WHERE celular = $cel";

$resu = $conn->query($consu);

if($resu->num_rows > 0){
?>
<body>
<script>
swal({
  type: 'error',
  title: 'Oops...',
  text: 'Este celular pertenece a otro empleado ya registrado',

}).then(function() {
// Redirect the user
window.location.href = "admin_ctrl_empleados.php";

});
</script>
</body>

<?php

echo "<script>window.open('admin_ctrl_empleados.php','_self')</script>";
}else{

$sql = "INSERT INTO personal (tipo, usuario, contrasena, nombre, apellidos, correo, celular, rec_id_recepcion,horas,hora_entrada,hora_salida)
VALUES ('$tipo','$usu','$pass', '$nom', '$ape', '$cor', '$cel','$suc','$hora','$hora_e','$hora_s');";
$res = $conn->query($sql);
echo "<script>window.open('admin_ctrl_empleados.php','_self')</script>";




}
?>
