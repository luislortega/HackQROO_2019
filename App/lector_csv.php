<!--
=========================================================
 Paper Dashboard 2 - v2.0.0
=========================================================
 Product Page: https://www.creative-tim.com/product/paper-dashboard-2
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 Licensed under MIT (https://github.com/creativetimofficial/paper-dashboard/blob/master/LICENSE)
 Coded by Creative Tim
=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<?php
//DEPUES DEL GUARDADO HACER EL ALGORITMO
$array_lista = array();

session_start();

if (isset($_SESSION['id_usuario'])) {
    $mysqli = new mysqli("localhost", "root", "", "seijuve");

    /* verificar la conexión */
    if (mysqli_connect_errno()) {
        printf("Falló la conexión failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $query = "SELECT * FROM programas WHERE id_institucion='".$_SESSION['id_usuario']."'";
    $result = $mysqli->query($query);

    while ($row = $result->fetch_row()) {
        array_push($array_lista, $row);
    }
        
    //echo json_encode($rows);
} else {
    header("Location: index.php");
    exit();
}
    //echo json_encode($array_lista);

$row = 0;
$programa = null;
$array_elementos = array(); //elementos de las variables
$array_variables = array(); //variables de las tablas
$array_data = array();
if (isset($_POST["submit"])) {
    if (isset($_FILES["file"]) && isset($_GET["q"])) {
        //programa obtenido
        $programa = $_POST["programa"];
        //if there was an error uploading the file
        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
        } else {
            if (file_exists("upload/" . $_FILES["file"]["name"])) {
                // SI YA EXISTE ACTUALZIAR EL TAG
                $contador = rand(0, 100000);
                $nombre_sin_extencion = explode(".", $_FILES["file"]["name"]);
                move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $nombre_sin_extencion[0] . "-" . $contador . "." . $nombre_sin_extencion[1]);
                $sql = "UPDATE programas SET carpeta_datos_programa='upload/". $nombre_sin_extencion[0] . "-" . $contador . "." . $nombre_sin_extencion[1]."' WHERE nombre_programa='".$_POST["programa"]."'";
                if ($mysqli->query($sql) === true) {
                    echo "Record updated successfully";
                } else {
                    echo "Error updating record: " . $mysqli->error;
                }
            } else {
                //Ponerle un sin tag
                move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
                $sql = "UPDATE programas SET carpeta_datos_programa='upload/" . $_FILES["file"]["name"] . "' WHERE nombre_programa='".$_POST["programa"]."'";
                if ($mysqli->query($sql) === true) {
                    echo "Record updated successfully";
                } else {
                    echo "Error updating record: " . $mysqli->error;
                }

            }
        }
        if (($handle = fopen("upload/" . $_FILES["file"]["name"], "r")) !== false) {
            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                $num = count($data);
                $row++;
                array_push($array_data, $data);
                //El row 1 contiene todas los elementos.
                if ($row === 1) {
                    foreach ($data as $key => $value) {
                        if ($key != 0) {
                            array_push($array_elementos, $data[$key]);
                        }
                    }
                }
                //Desde aqui se empieza a agarrar los primeros elementos.
                if ($row >= 2) {
                    array_push($array_variables, $data[0]);
                }
            }
            fclose($handle);
        }
    } else {
        echo "No file selected <br />";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="http://pprioritariosqroo.com/assets/img/logo.png">
    <link rel="icon" type="image/png" href="http://pprioritariosqroo.com/assets/img/logo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" href="css/lector_estilos.css">
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
    <link rel="stylesheet" href="css/estilos_lector.css">
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="white" data-active-color="danger">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->

            <div class="logo">
                <a href="admin.php" class="simple-text logo-mini">
                    <div class="logo-image-small">
                        <img src="http://pprioritariosqroo.com/assets/img/logo.png">
                    </div>
                </a>
                <a href="admin.php" class="simple-text logo-normal">
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
          
          <li >
            <a href="programasins.php">
              
              <i class="nc-icon nc-tile-56"></i>
              <p>Programas</p>
            </a>
          </li>
            
         <li class="active ">
            <a href="lector_csv.php">
              
              <i class="nc-icon nc-glasses-2"></i>
              <p>Registrar Datos</p>
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> Lector CSV dinamico</h4>
                            </div>
                            <div class="card-body">
                                <table width="600">
                                    <!-- 
                                    LECTOR DE LUIS LEON 
                                    -->
                                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>?q=1#popup1" method="post" enctype="multipart/form-data">
                                        <p>Programas de mi institucion</p>
                                        <select name="programa">

                                        <?php
                                        foreach ($array_lista as $key => $value) {
                                            echo '<option value="'.$value[1].'">';
                                            echo $value[1];
                                            echo '</option>';
                                        }
                                        ?>    
                                        </select>
                                        <tr>
                                            <td width="20%">Selecciona CSV </td>
                                            <td width="80%"><input type="file" name="file" id="file" /></td>
                                        </tr>

                                        <tr>
                                            <td><input type="submit" name="submit" /></td>
                                        </tr>

                                    </form>
                                </table>
                            </div>
                        </div>
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

    <!-- 
        VENTANA EMERGENTE PARA LA SELECCION DE VARIABLES QUE QUIERES MOSTRAR.
      -->
    <div id="popup1" class="overlay">
        <div class="popup">
            <h5>Hemos detectado que tienes estos campos</h5>
            <p>* Vas a actualizar los datos sobre tu programa por favor selecciona que variables quieres que se muestren.</p>
            <div class="anyClass">

                <?php
                $maxVar = 0;
                $maxElemen = 0;
                if (isset($_GET["q"])) {
                    foreach ($array_variables as $key => $value) {
                        echo '<br>';
                        if ($key > $maxVar) {
                            $maxVar = $key;
                        }
                        echo '<p style="font-size:20px !important; margin: 0 !important;"> <input type="checkbox" name="' . $array_variables[$key] . '" id="variables" ">', $array_variables[$key], ' </p>';
                        foreach ($array_elementos as $key2 => $value) {
                            if ($array_data[$key + 1][$key2 + 1] !== '') {
                                if ($key2 > $maxElemen) {
                                    $maxElemen = $key2;
                                }
                                echo '<input type="checkbox" name="' . $array_variables[$key] . '/' . $array_elementos[$key2] . '" id="elementos" style="margin-left: 1em;"> ', $array_elementos[$key2], ' <br>';
                            }
                        }
                    }
                }
                echo '<p id="programa_obtenido">' . $programa . '</p>';
                ?>
                <button type="button" class="btn btn-primary" onclick="clickSubir()">Subir</button>

                <script>
                    var variables = document.querySelectorAll("[id='variables']");
                    var elementos = document.querySelectorAll("[id='elementos']");
                    var programa_seleccionado = document.getElementById("programa_obtenido");

                    function clickSubir() {
                        //console.log(programa_seleccionado.innerHTML)
                        let test = new Array(new Array(), new Array());
                        variables.forEach(
                            function(currentValue, currentIndex, listObj) {
                                if (currentValue.checked === true) {
                                    test[0].push(currentValue.name)
                                    let array_elementos = new Array();
                                    //buscar elementos
                                    elementos.forEach(
                                        function(currentValue2, currentIndex2, listObj2) {
                                            let nombre_separado = currentValue2.name.split("/")
                                            if (nombre_separado[0] === currentValue.name) {
                                                array_elementos.push(nombre_separado[1])
                                            }
                                        },
                                        'miEsteArg'
                                    );
                                    if (array_elementos.length) {
                                        test[1].push(array_elementos);
                                    }
                                }
                            },
                            'miEsteArg'
                        );

                        let json_data = programa_seleccionado.innerHTML
                        let json_data2 = JSON.stringify(test)
                        httpGet("http://localhost/Php/Hackaton/HackQROO_2019/App/panel/ajax/upload_json.php?array_datos="+json_data2+"&programa="+json_data)
                        //Enviar al servidor 
                    }

                    function httpGet(theUrl){
                        const xhr = new XMLHttpRequest();
                        xhr.onreadystatechange = () => {
                            if(xhr.readyState == 4 && xhr.status == 200) {
                                console.log(xhr.responseText);
                                window.location.replace("http://localhost/Php/Hackaton/HackQROO_2019/App/lector_csv.php?f=1#popup2");
                            }
                        };
                        xhr.open("GET", theUrl, true);
                        xhr.send();

                    }
                </script>
            </div>
        </div>
    </div>
    <div id="popup2" class="overlay">
        <div class="popup">
            <h5>Archivo subido correctamente</h5>
            <img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/512/Tick_Mark-512.png" alt="" srcset="">
            <a href="http://localhost/Php/Hackaton/HackQROO_2019/App/lector_csv.php">CERRAR</a>
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
</body>

</html>