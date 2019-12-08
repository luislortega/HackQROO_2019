		$(function() {
			load(1);
		});
		function load(page){
			var query=$("#q").val();
			var per_page=10;
			var parametros = {"action":"ajax","page":page,'query':query,'per_page':per_page};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'panel/ajax/listar_institutos.php',
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
		$('#editProductModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		 
		  var code = button.data('code') 
		  $('#edit_name').val(code)
		  
		  var name = button.data('name') 
		  $('#edit_description').val(name)
		  
		  var category = button.data('category') 
		  $('#edit_imagen').val(category)
		  
		  var stock = button.data('stock') 
		  $('#edit_user').val(stock)
		  
		  var price = button.data('price') 
		  $('#edit_password').val(price)
		  
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
					url: "panel/ajax/editar_instituto.php",
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
			$('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "panel/ajax/guardar_instituto.php",
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
					url: "panel/ajax/eliminar_instituto.php",
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