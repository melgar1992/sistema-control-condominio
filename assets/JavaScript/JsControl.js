$(document).ready(function () {
	var base_url = $("#base_url").val();
	var tabla_control = $('#control_tabla').DataTable({
		"columnDefs": [{
			"targets": -1,
			"data": null,
			"defaultContent": "<div class='btn-group'><button type='button'  class='btn btn-warning btn-editar'><span class='fa fa-pencil'></span></button><button type='button' class='btn btn-danger btn-borrar'><span class='fa fa-remove'></span></button></div>",
		}],
		"language": {
			'lengthMenu': "Mostrar _MENU_ registros",
			"zeroRecords": "No se encontraron resultados",
			"info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registro",
			"infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
			"infoFiltered": "(filtrado de un total de _MAX_ registros)",
			"sSearch": "Buscar",
			"oPaginate": {
				"sFirst": "Primero",
				"sLast": "Ultimo",
				"sNext": "Siguiente",
				"sPrevious": "Anterior",

			},
			"sProcesing": "Procesando...",
		},
		responsive: "true",

	});


	$('#control').submit(function (e) {
		e.preventDefault();
		nombre = $('#nombre').val();
		apellidos = $('#apellidos').val();
		ci = $('#ci').val();
		id_categoria_visita = $('#id_categoria_visita').val();
		placa = $('#placa').val();
		color = $('#color').val();
		marca = $('#marca').val();
		id_copropietario = $('#id_copropietario').val();

		$.ajax({
			type: "POST",
			url: base_url + "Formularios/control/guardarControl",
			data: "data",
			dataType: "dataType",
			success: function (response) {

			}
		});

	});







	$(document).on('click', '.btn-borrar', function () {


		Swal.fire({
			title: 'Esta seguro de elimar?',
			text: "La cateogira de la visita se eliminara!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si, deseo elimniar!',
			cancelButtonText: 'Cancelar'
		}).then((result) => {
			if (result.value) {

				var id = $(this).val();

				$.ajax({
					url: base_url + 'Formularios/Categoria_visita/borrar/' + id,
					type: 'POST',
					success: function (resp) {

						window.location.href = base_url + resp;
					}
				})


			}
		})

	})


})
