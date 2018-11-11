<?php
include'fuctions.php';
include'conexion.php';
//verificar_sesion();

            $var_tipo = $_SESSION['tipo'];

                        if($var_tipo == "Administrador") {
                          header("Location: administrador.php");
                        }
                        if($var_tipo == "Recepcion") {
                            header("Location: recepcion.php");
                          }
                          if($var_tipo == "Mercado libre") {
                            header("Location: ml.php");
                          }
                          if($var_tipo == "Tecnico") {
                            header("Location: tecnico.php");
                          }
                          if($var_tipo == "Traslado") {
                            header("Location: /traslados/traslados.php");
                          }
                          if($var_tipo == "Almacen") {
                            header("Location: almacen.php");
                          }
                          if($var_tipo == "Jefe de taller") {
                            header("Location: taller.php");
                          }
                  
                        ?>
<!DOCTYPE html>
<html>
  <head>
    

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Electroinca RSH LOGIN</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Electronica RSH</h1>
      </div>
      <div class="login-box">
         <!-- Iniciar sesion css-->
        <form class="login-form" action="manejador.php" method="post">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Iniciar sesión</h3>
          <div class="form-group">
            <label class="control-label">Usuario</label>
            <input name='user' class="form-control" type="text" placeholder="Email" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">Contraseña</label>
            <input name="pass" class="form-control" type="password" placeholder="Password">
          </div>
          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
                <label>
                  <input type="checkbox"><span class="label-text">Mantener la sesión</span>
                </label>
              </div>
              <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Olvidó su contraseña ?</a></p>
            </div>
          </div>
          <div class="form-group btn-container">
            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>Iniciar</button>
          </div>
        </form>

 <!-- Recuperar contraseña css-->
        <form class="forget-form" action="index.php">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Olvidó su contraseña  ?</h3>
          <div class="form-group">
            <label class="control-label">Correo</label>
            <input class="form-control" type="text" placeholder="Email">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>Restaurar</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
          </div>
        </form>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
</html>