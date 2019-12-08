<?php


 $prod_code =  "sadasdsad";
	$prod_name = "sadasdsad";
	$prod_ctry = "sadasdsad";
	$stock = "sadasdsad";
	$price = "sadasdsad";

	$id = 7;
	// UPDATE data into database

    $sql = "UPDATE instituciones SET nombre_institucion ='".$prod_code."', 
								     descripcion_institucion = '".$prod_name."',
								     imagen_institucion = '".$prod_ctry."',
								     usuario_institucion = '".$stock."',
								     password_institucion = '".$price."'

								     WHERE id_instituciones=".$id;



								     echo $sql;