<?php
	if (empty($_POST['name'])){
		$errors[] = "Ingresa el nombre del producto.";
	} elseif (!empty($_POST['name'])){
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
    $prod_code = mysqli_real_escape_string($con,(strip_tags($_POST["name"],ENT_QUOTES))); //name
	$prod_name = mysqli_real_escape_string($con,(strip_tags($_POST["description"],ENT_QUOTES))); //desciption
	$prod_ctry = mysqli_real_escape_string($con,(strip_tags($_POST["imagen"],ENT_QUOTES))); //imagen
	$stock = mysqli_real_escape_string($con,(strip_tags($_POST["user"],ENT_QUOTES))); //user
	$price = mysqli_real_escape_string($con,(strip_tags($_POST["password"],ENT_QUOTES))); //password
	

	// REGISTER data into database
    $sql = "INSERT INTO `instituciones`(`id_instituciones`, `nombre_institucion`, `descripcion_institucion`, `imagen_institucion`, `usuario_institucion`, `password_institucion`) VALUES (NULL,'$prod_code','$prod_name','$prod_ctry','$stock','$price')";
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