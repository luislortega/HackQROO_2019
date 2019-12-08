<?php
	
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

	$query = mysqli_query($con,"SELECT id_instituciones,nombre_institucion FROM  instituciones");
	//loop through fetched data

	if ($query){
		
	?>
		
	<div class="form-group">
  <label for="sel1">Instituto:</label>
  <select class="form-control" id="selectboxx" name="selectboxx">

						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query)){	
							$id_institucion=$row['id_instituciones'];
							$nombre_institucion=$row['nombre_institucion'];
							
						?>	
					
    <option value="<?php echo $id_institucion; ?>"><?php echo $nombre_institucion; ?></option>

						<?php }?>
						  </select>
</div>
					
	<?php	
	}	
?>          