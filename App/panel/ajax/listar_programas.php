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

	
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){

	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));

	$tables="programas";
	$campos="*";
	$sWhere=" programas.nombre_programa LIKE '%".$query."%'";
	$sWhere.=" order by programas.nombre_programa";
	
	
	include 'pagination_programas.php'; //include pagination file
	//pagination variables
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	$per_page = intval($_REQUEST['per_page']); //how much records you want to show
	$adjacents  = 4; //gap between pages after number of adjacents
	$offset = ($page - 1) * $per_page;
	//Count the total number of row in your table*/
	$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM $tables where $sWhere ");
	if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
	else {echo mysqli_error($con);}
	$total_pages = ceil($numrows/$per_page);
	//main query to fetch the data
	$query = mysqli_query($con,"SELECT $campos FROM  $tables where $sWhere LIMIT $offset,$per_page");
	//loop through fetched data
	

		
	
	if ($numrows>0){
		
	?>
		



		 <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th class="text-center">
                        Nombre del Programa
                      </th>
                      <th class="text-center">
                        Descripción del Programa
                      </th>
                     <th class="text-center">
                        Carpeta de Datos
                      </th>
                      <th class="text-center">
                        Json de Datos
                      </th>
                      <th class="text-center">
                        Institución Perteneciente
                      </th>

                      <th class="text-center">
                        Acciones
                      </th>
                    </thead>
                  
						

                    <tbody>	
						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query)){	
							$product_id=$row['id_programa'];
							$prod_code=$row['nombre_programa'];
							$prod_name=$row['descripcion_programa'];
							$prod_ctry=$row['carpeta_datos_programa'];
							$prod_qty=$row['json_datos_programa'];
							$tag = $row['tag_archivo_programa'];
							$price=$row['id_institucion'];	

							$query222 = mysqli_query($con,"SELECT nombre_institucion FROM  instituciones WHERE id_instituciones = ".$price);
					
							$finales++;
						?>	
						<tr class="">
							<td class='text-center'><?php echo $prod_code;?></td>
							<td ><?php echo $prod_name;?></td>
							<td >
								
								<?php echo $prod_ctry;?>

							</td>

							<td >
								
								<?php echo $prod_ctry;?>

							</td>
							<td class='text-center' >
								<?php 

									while($row2 = mysqli_fetch_array($query222)){	
									  echo $row2['nombre_institucion'];
									}

								 ?>
								
							</td>
							
							<td>
								<a style="margin: 1px;" href="#"  
								data-target="#editProductModal" 
								class="btn btn-primary btn-sm"
								data-toggle="modal" 
								data-nombrep='<?php echo $prod_code;?>' 
								data-descripcionp="<?php echo $prod_name?>" 
								data-carpetadatosp="<?php echo $prod_ctry?>" 
								data-datosprogramap="<?php echo $prod_qty?>" 
								data-idinstitucionp="<?php echo $price;?>" 
								data-tagp="<?php echo $tag;?>" 
								data-id="<?php echo $product_id; ?>"
							    title="Editar"
							    role="button"
							    aria-disabled="true">

								<i class="fa fa-pencil"></i>
							</a>

							<a href="#deleteProductModal" 
								class="btn btn-primary btn-sm"
								data-toggle="modal" 
								data-nombrep='<?php echo $prod_code;?>' 
								data-descripcionp="<?php echo $prod_name?>" 
								data-carpetadatosp="<?php echo $prod_ctry?>" 
								data-datosprogramap="<?php echo $prod_qty?>" 
								data-idinstitucionp="<?php echo $price;?>" 
								data-id="<?php echo $product_id; ?>"
								data-tagp="<?php echo $tag;?>" 
							    title="Editar"
							    role="button"
							    aria-disabled="true">

								<i class="fa fa-trash"></i>
							</a>

							
                    		</td>
						</tr>
						<?php }?>
						<tr>
							<td colspan='6'> 
								<?php 
									$inicios=$offset+1;
									$finales+=$inicios -1;
									echo "Mostrando $inicios al $finales de $numrows registros";
									echo paginate( $page, $total_pages, $adjacents);
								?>
							</td>
						</tr>
				</tbody>
                  </table>
                </div>

	
	
	<?php	
	}	
}
?>          