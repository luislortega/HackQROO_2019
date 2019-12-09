<?php
session_start();
if (isset( $_SESSION['id_usuario'] )) {

} else {
  header("Location: index.php");
  exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="http://pprioritariosqroo.com/assets/img/logo.png">
  <link rel="icon" type="image/png" href="http://pprioritariosqroo.com/assets/img/logo.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    SEIJUVE QROO
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="panel/css/bootstrap.min.css" rel="stylesheet" />
  <link href="panel/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="panel/demo/demo.css" rel="stylesheet" />
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->

      <div class="logo">
        <a href="instituto.php" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="http://pprioritariosqroo.com/assets/img/logo.png">
          </div>
        </a>
        <a href="instituto.php" class="simple-text logo-normal">
          SEIJUVE QROO
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>

      <div class="sidebar-wrapper">
        <ul class="nav">
          <li >
            <a href="instituto.php">
               <i class="nc-icon nc-diamond"></i>
              <p>Panel de Control</p>
            </a>
          </li>


          
          <li class="active ">
            <a href="programasins.php">
              
              <i class="nc-icon nc-tile-56"></i>
              <p>Programas</p>
            </a>
          </li>
            
         <li >
            <a href="lector_csv.php">
               <i class="nc-icon nc-diamond"></i>
              <p>Subir Datos</p>
            </a>
          </li>
         
        </ul>
      </div>

    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Panel de Administración</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            
            <ul class="navbar-nav">
             
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-single-02"></i>
                   <?php echo  $_SESSION['user_usuario']; ?>
                  <p>
                    <span class="d-lg-none d-md-block ">Opciones</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="logout.php">Cerrar Sesión</a>
                 
                </div>
              </li>
             
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <!-- <div class="panel-header panel-header-sm">


</div> -->
     <div class="content">
        <div class="row">
          <?php if($_SESSION['rango_usuario'] == "instituto"){ ?>
          <div class="col-sm-6">
            <a href="#addProductModal" class="btn btn-success" data-toggle="modal"><i class="nc-icon nc-simple-add"></i> <span>Agregar Nuevo Programa</span></a>
          </div>
          <?php }else{ ?>
             <div class="col-sm-6 disabled" >
            <a href="#addProductModal" class="btn btn-success disabled" data-toggle="modal"><i class="nc-icon nc-simple-add"></i> <span>Agregar Nuevo Programa</span></a>
          </div>
             <?php }?>
          <div class="col-md-6 align-right">
            <div id="custom-search-input">
                            <div class="input-group col-md-12">
                                <input type="text" class="form-control" placeholder="Buscar"  id="q" onkeyup="load(1);" />
                                <span class="input-group-btn">
                                    <button class="btn btn-info" type="button" onclick="load(1);">
                                        <span class="fa fa-search"></span>
                                    </button>
                                </span>
                            </div>
                </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Programas</h4>
              </div>
              <div class="card-body">

               <!-- asdasdaskdanskasndkasndkjas-->
               <div class='clearfix'></div>
                <hr>
                <div id="loader"></div><!-- Carga de datos ajax aqui -->
                <div id="resultados"></div><!-- Carga de datos ajax aqui -->
                <div class='outer_div'></div><!-- Carga de datos ajax aqui -->

              </div>
            </div>
          </div>
        </div>


      </div>

       <div id="addProductModal" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <form name="add_product2" id="add_product2">
              <div class="modal-header">            
                <h4 class="modal-title">Agregar Instituto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">          
               <input type="hidden" name="selectboxx" id="selectboxx" value="<?php echo $_SESSION['id_usuario'] ?>">
                <div class="form-group">
                  <label>Nombre del Programa</label>
                  <input type="text" name="nombre" id="nombre" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Descripción del Programa</label>
                  <input type="text" name="description" id="description" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Carpeta de Datos</label>
                  <input type="text" name="carpeta" id="carpeta" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Json de Datos</label>
                  <input type="text" name="json" id="json" class="form-control" required>
                </div> 

                 <div class="form-group">
                  <label>TAG Archivo Programa</label>
                  <input type="text" name="tag" id="tag" class="form-control" required>
                </div> 

              

              </div>
              <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                <input type="submit" class="btn btn-success" value="Guardar">
              </div>
            </form>
          </div>
        </div>
      </div>

      <div id="deleteProductModal" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <form name="delete_product" id="delete_product">
              <div class="modal-header">            
                <h4 class="modal-title">Eliminar Instituto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">          
                <p>¿Seguro que quieres eliminar este registro?</p>
                <p class="text-warning"><small>Esta acción no se puede deshacer y los datos almacenados con ellos seran eliminados.</small></p>
                <input type="hidden" name="delete_id" id="delete_id">
              </div>
              <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                <input type="submit" class="btn btn-danger" value="Eliminar">
              </div>
            </form>
          </div>
        </div>
      </div>


      <div id="editProductModal" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <form name="edit_product" id="edit_product">
              <input type="hidden" name="edit_id" id="edit_id" >
              <div class="modal-header">            
                <h4 class="modal-title">Editar Instituto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">          
               
                <div class="form-group">
                  <label>Nombre del Programa</label>
                  <input type="text" name="edit_nombre" id="edit_nombre" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Descripción del Programa</label>
                  <input type="text" name="edit_description" id="edit_description" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Carpeta de Datos</label>
                  <input type="text" name="edit_carpeta" id="edit_carpeta" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Json de Datos</label>
                  <input type="text" name="edit_json" id="edit_json" class="form-control" required>
                </div> 

                 <div class="form-group">
                  <label>TAG Archivo Programa</label>
                  <input type="text" name="edit_tag" id="edit_tag" class="form-control" required>
                </div> 

                <div id="cargar_datos_boxx"></div> 
                <div id="cargar_datos_box22"></div> 


              </div>
              <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                <input type="submit" class="btn btn-success" value="Guardar">
              </div>
            </form>
          </div>
        </div>
      </div>



        <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
          
            <div class="credits ml-auto">
              <span class="copyright">
                ©
                <script>
                  document.write(new Date().getFullYear())
                </script>, Todos los Derechos Reservados <i class="fa fa-heart heart"></i> IQJ
              </span>
            </div>
          </div>
        </div>
      </footer>
      
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="panel/js/core/jquery.min.js"></script>
  <script src="panel/js/core/popper.min.js"></script>
  <script src="panel/js/core/bootstrap.min.js"></script>
  <script src="panel/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="panel/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="panel/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="panel/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="panel/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
   <script src="panel/js/script_programasin.js"></script>
</body>

</html>
