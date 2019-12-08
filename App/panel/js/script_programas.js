		$(function() {
			load(1);
			cargarprogramas(1);
		});
		function load(page){
			var query=$("#q").val();
			var per_page=10;
			var parametros = {"action":"ajax","page":page,'query':query,'per_page':per_page};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'panel/ajax/listar_programas.php',
				data: parametros,
				 beforeSend: function(objeto){
				$("#loader").html("Cargando...");
				
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$("#loader").html("");
				}
			})
		}

		function cargarprogramas(page){
			$.ajax({
				url:'panel/ajax/selectbox.php',
				 beforeSend: function(objeto){
				$("#loader").html("Cargando...");

			  },
				success:function(data){
					$("#cargar_datos_box2").html(data);
					$(".cargar_datos_box2").html(data).fadeIn('slow');
					$("#cargar_datos_box").html("");
				}
			})
		}
		


		$('#editProductModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		 
		  var code = button.data('nombrep') 
		  $('#edit_nombre').val(code)
		  
		  var name = button.data('descripcionp') 
		  $('#edit_description').val(name)
		  
		  var category = button.data('carpetadatosp') 
		  $('#edit_carpeta').val(category)
		  
		  var stock = button.data('datosprogramap') 
		  $('#edit_json').val(stock)
		  
		  var price = button.data('idinstitucionp') 
		  $('#edit_password').val(price)

		    var price2 = button.data('tagp') 
		  $('#edit_tag').val(price2)
		  
		  var id = button.data('id') 
		  $('#edit_id').val(id)
		})
		
		$('#deleteProductModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var id = button.data('id') 
		  $('#delete_id').val(id)
		})
		
		
		$( "#edit_product" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "panel/ajax/editar_programa.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#editProductModal').modal('hide');
					$('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
				  }
			});
		  event.preventDefault();
		});
		
		
		$( "#add_product" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "panel/ajax/guardar_programa.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#addProductModal').modal('hide');
					$('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
				  }
			});
		  event.preventDefault();
		});
		
		$( "#delete_product" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "panel/ajax/eliminar_programa.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#deleteProductModal').modal('hide');
					$('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
				  }
			});
		  event.preventDefault();
		});