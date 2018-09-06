<?php
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];

        if(isset($_GET['ore'])){

            $id_clie = $_GET['ore'];
            
            $consulta = "SELECT * FROM calificaciones WHERE ID_CALIFICACIONES='$id_clie'";
            $ejecutar = mysqli_query($conn, $consulta);

            $fila=mysqli_fetch_array($ejecutar);
            //$id_c          = $fila['ID_CALIFICACIONES'];
            $nivel         = $fila['CAL_NIVEL_INGLES'];
            $calificacion  = $fila['CAL_CALIFICACION'];
            $unidad        = $fila['CAL_UNIDAD'];
            $promedio      = $fila['CAL_PROMEDIO'];
            $id            = $fila['CAL_ID_BECARIO'];
  }
?>
<html lang="es">
  <head>

    <!-- Open Graph Meta-->
    <title>Equipos sin reparación</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <!-- Font-icon css-->


  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="index.html">ID de Usuario: </a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <li class="app-search">
          <input class="app-search__input" type="search" placeholder="Search">
          <button class="app-search__button"><i class="fa fa-search"></i></button>
        </li>
        <!--Notification Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
          <ul class="app-notification dropdown-menu dropdown-menu-right">
            <li class="app-notification__title">You have 4 new notifications.</li>
            <div class="app-notification__content">
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Lisa sent you a mail</p>
                    <p class="app-notification__meta">2 min ago</p>
                  </div></a></li>
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Mail server not working</p>
                    <p class="app-notification__meta">5 min ago</p>
                  </div></a></li>
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Transaction complete</p>
                    <p class="app-notification__meta">2 days ago</p>
                  </div></a></li>
              <div class="app-notification__content">
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Lisa sent you a mail</p>
                      <p class="app-notification__meta">2 min ago</p>
                    </div></a></li>
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Mail server not working</p>
                      <p class="app-notification__meta">5 min ago</p>
                    </div></a></li>
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Transaction complete</p>
                      <p class="app-notification__meta">2 days ago</p>
                    </div></a></li>
              </div>
            </div>
            <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
          </ul>
        </li>
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
            <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
            <li><a class="dropdown-item" href="destroy.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">

        <div>
          <p class="app-sidebar__user-name"><?php $var_name ?></p>

        </div>
      </div>
      <ul class="app-menu">
      <li><a class="app-menu__item" href="#"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Inicio</span></a></li>
      <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Recepcion</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
            <li><a class="treeview-item" onclick="alerta();" href="#"><i  class="icon fa fa-circle-o"></i> Nuevo cliente</a></li>
            <li><a class="treeview-item" href="bootstrap-components.html"><i class="icon fa fa-circle-o"></i> Equipos sin solución</a></li>

            <li><a class="treeview-item" href="ui-cards.html"><i class="icon fa fa-circle-o"></i> Avisos</a></li>
            <li><a class="treeview-item" href="widgets.html"><i class="icon fa fa-circle-o"></i> Ventas</a></li>
          </ul>
      <li><a class="app-menu__item" href="index.html"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Clientes</span></a></li>
      <li><a class="app-menu__item" href="index.html"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Taller</span></a></li>
      <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">MercadoLibre</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
            <li><a class="treeview-item" href="bootstrap-components.html"><i class="icon fa fa-circle-o"></i> Nueva publicacion</a></li>
            </ul>
      <li><a class="app-menu__item" href="index.html"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Traslados</span></a></li>
      <li><a class="app-menu__item" href="index.html"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Almacén</span></a></li>
      <li><a class="app-menu__item" href="index.html"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Administración</span></a></li>





    </aside>
    <main class="app-content">
      <div class="app-title">

          <h3><i class="fa fa-dashboard"></i>Electronica RSH</h3>


      </div>

        <!-- primer panel -->
                              <div class="card text-white bg-info mb-3">
                                <div class="card-header">Orden de servicio
                                  <div class="col-md-1">
                                    <input type="text"  name="ods" editable= "false" required  class="form-control border-input">
                              </div>
                            </div>
                                <div class="card-body">



                                          <div class="row">
      																			<div class="col-md-2">
      																					<div class="form-group">
      																							<label for="exampleInputEmail1">Equipo</label>
      																							<input type="text" name="equi" maxlength="25" required class="form-control border-input" >
      																					</div>
      																			</div>
                                            <div class="col-md-2">
      																					<div class="form-group">
      																							<label for="exampleInputEmail1">Marca</label>
      																							<input type="text" name="marc" maxlength="25" required class="form-control border-input" >
      																					</div>
      																			</div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Modelo</label>
                                                    <input type="text" name="mode" maxlength="25" required class="form-control border-input" >
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Falla</label>
                                                    <input type="text" name="falla" maxlength="25"  required class="form-control border-input" >
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Accesorios</label>
                                                    <input type="text" name="acc" maxlength="25" required class="form-control border-input" >
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Locación</label>
                                                    <input type="text" name="loc" maxlength="25" required class="form-control border-input" >
                                                </div>
                                            </div>
                                          </div>

      																		<div class="row">
      																			<div class="col-md-2">
      																					<div class="form-group">
      																							<label for="exampleInputEmail1">Fecha de solicitud de servicio</label>
      																							<input type="text" name="fech_sol" maxlength="15"  required class="form-control border-input">
      																					</div>
      																			</div>

      																			<div class="col-md-2">
      																					<div class="form-group">
      																							<label for="exampleInputEmail1">Fecha de entrega</label>
      																							<input type="text" name="fech_entr" maxlength="15"  required class="form-control border-input">
      																					</div>
      																			</div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Estado de reparación</label>
                                                    <input type="text" name="estado" maxlength="15"  required class="form-control border-input">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Comentarios</label>
                                                    <textarea class="form-control" name="comen"  rows="3"></textarea>
                                                </div>
                                            </div>
                                          </div>


                                    </div>
                              </div>
                              <!-- fin 1er panel -->


                              <!-- inicio 2do panel -->
                              <div class="card text-white bg-primary mb-3">
                                <div class="card-header">Contacto cliente</div>
                                <div class="card-body">



                                          <div class="row">
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Id cliente</label>
                                                    <input type="text" name="id_clien"  required class="form-control border-input" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Nombre(s)</label>
                                                    <input type="text" name="nom_clie"  required class="form-control border-input" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Apellidos</label>
                                                    <input type="text" name="ape_clien" required class="form-control border-input" >
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"># Celular</label>
                                                    <input type="text" name="cel_clien"  required class="form-control border-input" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Correo</label>
                                                    <input type="text" name="cor_clien" required class="form-control border-input" >
                                                </div>
                                            </div>

                                          </div>


                                    </div>
                              </div>

                              <!-- fin 2do panel -->

                              <!-- inicio 3er panel -->
                              <div class="card text-white bg-secondary mb-3">
                                <div class="card-header">Presupuesto acordado</div>
                                <div class="card-body">


                                          <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Costo de refacción</label>
                                                    <input type="text" name="cost_ref"  required class="form-control border-input" >
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Mano de obra</label>
                                                    <input type="text"  name="mano_ob"  required class="form-control border-input" >
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Puntos</label>
                                                    <input type="text" name="punt" required class="form-control border-input" >
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Abono</label>
                                                    <input type="text" name="abon"  required class="form-control border-input" >
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Restante</label>
                                                    <input type="text" name="rest" required class="form-control border-input" >
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Total</label>
                                                    <input type="text" name="total" required class="form-control border-input" >
                                                </div>
                                            </div>


                                          </div>

                                    </div>
                              </div>

                              <!-- fin 3er panel -->





    </main>
    <!-- Essential javascripts for application to work-->

    <!-- Page specific javascripts-->
    <!-- Google analytics script-->
    <!-- js placed at the end of the document so the pages load faster -->
   <!-- Essential javascripts for application to work-->
   <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="assets/js/plugins/pace.min.js"></script>
     <!-- Page specific javascripts-->
    <script type="text/javascript" src="assets/js/plugins/moment.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/jquery-ui.custom.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/fullcalendar.min.js"></script>
    <script type="text/javascript">

    <script src="assets/js/sweetalert2.all.min.js"></script>
    <script src="assets/js/sweetalert2.js"></script>

    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <div class="content-panel">
 <div class="col-lg-7">

</div>
</div>


<!-- Script para buscar en tabla. -->

  </body>
</html>
