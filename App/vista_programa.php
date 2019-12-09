<?php
$array_lista = array();
if (isset($_GET['id_programa'])) {
    //Todo ok.
    $mysqli = new mysqli("localhost", "root", "", "seijuve");

    /* verificar la conexión */
    if (mysqli_connect_errno()) {
        printf("Falló la conexión failed: %s\n", $mysqli->connect_error);
        exit();
    }
    $query = "SELECT * FROM programas WHERE id_programa='".$_GET['id_programa']."'";
    $result = $mysqli->query($query);

    while ($row = $result->fetch_row()) {
        array_push($array_lista, $row);
    }
    //echo json_encode($array_lista[0]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Programa de Quintana Roo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    <style>
        *{
            text-align:center;
        }
        p {
            position: absolute;
            display: none;
        }
    </style>
    <?php 
        echo '<h1> Datos graficos sobre '.$array_lista[0][1].'</h1>';
        echo '<h3>'.$array_lista[0][2].'</h3>';
        echo '<p>id:</p>';
        echo '<p id="id">'.$array_lista[0][0].'</p>';
        echo '<br>';
        echo '<p>nombre:</p>';
        echo '<p id="nombre">'.$array_lista[0][1].'</p>';
        echo '<br>';
        echo '<p>descripcion:</p>';
        echo '<p id="descripcion">'.$array_lista[0][2].'</p>';
        echo '<br>';
        echo '<p>carpeta:</p>';
        echo '<p id="carpeta">'.$array_lista[0][3].'</p>';
        echo '<br>';
        echo '<p>json:</p>';
        echo '<p id="json">'.Array($array_lista[0][4])[0].'</p>';
        echo '<br>';
        echo '<p>id_institucion:</p>';
        echo '<p id="id_institucion">'.$array_lista[0][5].'</p>';
        $array_variables_elementos = explode ("],[[", $array_lista[0][4]);  
        print_r($array_variables_elementos[0]); 
        foreach(explode(",", $array_variables_elementos[0]) as $key => $value){
            ?>
        <p id="variables"><?php echo $value;?></p>
    <?php
        
        }
        $array_variables = explode (",", $array_variables_elementos[0]); 
        foreach ($array_variables as $key => $value) { ?>
        <canvas id="bar-chart" width="800" height="450"></canvas>
        <br>
    <?php
        }
        $aray_elementos = explode ("],[", $array_variables_elementos[1]); 
        echo '<br>';
        print_r($aray_elementos); 
        foreach ($aray_elementos as $key => $value) { echo'<br>'; ?>
            <p id="elementos"><?php  echo $value; ?></p>
        <?php
        }

    ?>


   
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script>
        var charts_disponibles = document.querySelectorAll("[id='bar-chart']");
        var elementos_disponibles = document.querySelectorAll("[id='elementos']");
        var titulos = document.querySelectorAll("[id='variables']");
        let contador = 0;
        //Foreach de charts disponibles
        charts_disponibles.forEach(element => {
            //console.log(elementos_disponibles[contador].innerHTML);
            let array_labels = [];
            let value_labels = [];
            let background_datos = [];
            let titulo;
            let elementos =  elementos_disponibles[contador].innerHTML.split(",");
            elementos.forEach(element => {
                array_labels.push("hi"+Math.floor((Math.random() * 10) + 1));
                value_labels.push(Math.floor((Math.random() * 10) + 1))
                background_datos.push("#3e95cd");
            });
            titulo = titulos[contador].innerHTML.replace('"'," ")
            titulo = titulo.replace('"', " ")
            titulo = titulo.replace('[', " ")
            titulo = titulo.replace('[', " ")
            console.log(array_labels)
            console.log(value_labels)
            //console.log(elementos)
            new Chart(element, {
                type: 'bar',
                    data: {
                    labels: array_labels,
                        datasets: [
                        {
                        label: "Population (millions)",
          backgroundColor: background_datos,
          data: value_labels
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: titulo
      }
    }
});
            contador++;

        });
    // Bar chart

    </script>
    <h4> <a href="http://localhost/Php/Hackaton/HackQROO_2019/App/<?php echo $array_lista[0][3]; ?>">Descargar</a>  archivos CSV del programa.</h4>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>