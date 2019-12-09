<?php
if (isset($_GET['array_datos']) && isset($_GET['programa'])) {

    $mysqli = new mysqli("localhost", "root", "", "seijuve");

    /* verificar la conexión */
    if (mysqli_connect_errno()) {
        printf("Falló la conexión failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $sql = "UPDATE programas SET json_datos_programa='".$_GET['array_datos'] ."' WHERE nombre_programa='".$_GET['programa']."'";
    if ($mysqli->query($sql) === true) {
        echo "Record updated successfully";
        echo json_encode($_GET['array_datos']);
    } else {
        echo "Error updating record: " . $mysqli->error;
    }
}
