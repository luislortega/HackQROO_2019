<?php
	if (empty($_POST['edit_id'])){
		$errors[] = "ID está vacío.";
	} elseif (!empty($_POST['edit_id'])){
	define('DB_HOST','localhost');
	define('DB_USER','root');
	define('DB_PASS','');
	define('DB_NAME','seijuve');
	# conectare la base de datos
    $con=@mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Conexión falló: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
	// escaping, additionally removing everything that could be (html/javascript-) code
    $edit_nombre = $_POST["edit_nombre"];
	$edit_description = $_POST["edit_description"];
	$edit_carpeta = $_POST["edit_carpeta"];
	$edit_json = $_POST["edit_json"];
	$edit_tag = $_POST["edit_tag"];
	$ins = $_POST['selectboxx'];
	
	$id=intval($_POST['edit_id']);
	// UPDATE data into database

        $sql = "UPDATE programas SET nombre_programa ='".$edit_nombre."', 
								     descripcion_programa = '".$edit_description."',
								     carpeta_datos_programa = '".$edit_carpeta."',
								     json_datos_programa = '".$edit_json."',
								     id_institucion = '".$ins."',
								     tag_archivo_programa = '".$edit_tag."'

								     WHERE id_programa=".$id;

								     
								     $query = mysqli_query($con,$sql);
    // if product has been added successfully
    if ($query) {
        $messages[] = "El producto ha sido actualizado con éxito.";
    } else {
        $errors[] = "Lo sentimos, la actualización falló. Por favor, regrese y vuelva a intentarlo.";
    }
		
	} else 
	{
		$errors[] = "desconocido.";
	}
if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}
?>