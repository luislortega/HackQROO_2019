<?php
	if (empty($_POST['nombre'])){
		$errors[] = "Ingresa el nombre del producto.";
	} elseif (!empty($_POST['nombre'])){
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
    $nombre = mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES))); //name
	$description = mysqli_real_escape_string($con,(strip_tags($_POST["description"],ENT_QUOTES))); //desciption
	$carpeta = mysqli_real_escape_string($con,(strip_tags($_POST["carpeta"],ENT_QUOTES))); //imagen
	$json = mysqli_real_escape_string($con,(strip_tags($_POST["json"],ENT_QUOTES))); //user
	$tag = mysqli_real_escape_string($con,(strip_tags($_POST["tag"],ENT_QUOTES))); //password 
	$selectboxx = mysqli_real_escape_string($con,(strip_tags($_POST["selectboxx"],ENT_QUOTES)));

	// REGISTER data into database

    $sql = "INSERT INTO `programas`(`id_programa`, `nombre_programa`, `descripcion_programa`, `carpeta_datos_programa`, `json_datos_programa`, `id_institucion`, `tag_archivo_programa`) VALUES (null,'$nombre','$description','$carpeta','$json',$selectboxx,'$tag')";
    $query = mysqli_query($con,$sql);
    // if product has been added successfully
    if ($query) {
        $messages[] = "El producto ha sido guardado con éxito.";
    } else {
        $errors[] = "Lo sentimos, el registro falló. Por favor, regrese y vuelva a intentarlo.";
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