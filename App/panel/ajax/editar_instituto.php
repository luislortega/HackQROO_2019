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
    $prod_code = $_POST["edit_name"];
	$prod_name = $_POST["edit_description"];
	$prod_ctry = $_POST["edit_imagen"];
	$stock = $_POST["edit_user"];
	$price = $_POST["edit_password"];
	
	$id=intval($_POST['edit_id']);
	// UPDATE data into database

        $sql = "UPDATE instituciones SET nombre_institucion ='".$prod_code."', 
								     descripcion_institucion = '".$prod_name."',
								     imagen_institucion = '".$prod_ctry."',
								     usuario_institucion = '".$stock."',
								     password_institucion = '".$price."'

								     WHERE id_instituciones=".$id;

								     
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