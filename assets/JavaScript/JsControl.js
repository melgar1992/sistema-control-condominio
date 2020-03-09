$(document).ready(function () {
	var base_url = $("#base_url").val();
	var tabla_control = $('#control_tabla').DataTable({
		"columnDefs": [{
			"targets": -1,
			"data": null,
			"defaultContent": "<div class='btn-group'><button type='button' id= 'btn-salida' title='Marcar salida' value='<?php echo $control_visita->id_control_entrada_salida; ?>' class='btn btn-success btn-salida'><span class='fa fa-sign-out'></span></button><button type='button'  class='btn btn-warning btn-editar'><span class='fa fa-pencil'></span></button><button type='button' class='btn btn-danger btn-borrar'><span class='fa fa-remove'></span></button></div>",
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
	$('#placa').on('change', function () {
		str = $('#placa').val();
		$('#placa').val(str.toUpperCase());
	});

	$('#control').submit(function (e) {
		e.preventDefault();
		nombre = $('#nombre').val();
		apellidos = $('#apellidos').val();
		ci = $('#ci').val();
		id_categoria_visita = $('#categoria_visita').val();
		placa = $('#placa').val();
		color = $('#color').val();
		marca = $('#marca').val();
		id_copropietario = $('#copropietario').val();

		$.ajax({
			type: "POST",
			url: base_url + "Formularios/control/guardarControl",
			data: {
				nombre: nombre,
				apellidos: apellidos,
				ci: ci,
				id_categoria_visita: id_categoria_visita,
				placa: placa,
				color: color,
				marca: marca,
				id_copropietario: id_copropietario,
			},
			dataType: "json",
			success: function (respuesta) {
				if (respuesta['respuesta'] === 'Exitoso') {
					id_control = respuesta['datos']['id_control_entrada_salida'];
					nombre = respuesta['datos']['nombre'];
					apellidos = respuesta['datos']['apellidos'];
					ci = respuesta['datos']['ci'];
					id_categoria_visita = respuesta['datos']['id_categoria_visita'];
					placa = respuesta['datos']['placa'];
					color = respuesta['datos']['color'];
					marca = respuesta['datos']['marca'];
					copropietario = respuesta['datos']['copropietario'];
					fecha_entrada = respuesta['datos']['fecha_hora_ingreso'];
					tabla_control.row.add([id_control, nombre, apellidos, ci, id_categoria_visita, placa, color, marca, copropietario, fecha_entrada, '']).draw();
					swal({
						title: 'Guardar',
						text: respuesta['respuesta'],
						type: 'success'
					});

				} else {
					swal({
						title: 'Error',
						text: respuesta['respuesta'],
						type: 'error'
					});
				}

			}
		});

	});
	$(document).on('click','.btn-salida', function () {
		fila = $(this).closest('tr');
		id_control_entrada_salida = parseInt(fila.find('td:eq(0)').text());
		control_salida = fila.find('td:eq(10)').text();
		if (control_salida === '') {
			$.ajax({
				type: "POST",
				url: base_url + "Formularios/control/salidaControl",
				data: { id_control_entrada_salida: id_control_entrada_salida },
				dataType: "json",
				success: function (respuesta) {
					if (respuesta['respuesta'] === 'Exitoso') {
						fecha_salida = respuesta['datos']['fecha_hora_salida'];
						tabla_control.cell(fila, 10).data(fecha_salida).draw();
						swal({
							title: 'Editado',
							text: respuesta['respuesta'],
							type: 'success'
						});

					} else {
						swal({
							title: 'Error',
							text: respuesta['respuesta'],
							type: 'error'
						});
					}
				}
			});
		} else {
			swal({
				title: 'Advertencia',
				text: 'La hora de salida ya fue marcada',
				type: 'warning'
			});
		}


	});


	$(document).on('click', '.btn-editar', function () {

		fila = $(this).closest('tr');
		id_control_entrada_salida = parseInt(fila.find('td:eq(0)').text());
		nombre = fila.find('td:eq(1)').text();
		apellidos = fila.find('td:eq(2)').text();
		ci = fila.find('td:eq(3)').text();
		id_categoria_visita = fila.find('td:eq(4)').text();
		placa = fila.find('td:eq(5)').text();
		color = fila.find('td:eq(6)').text();
		marca = fila.find('td:eq(7)').text();
		id_copropietario = fila.find('td:eq(8)').text();


		$('#formeditar').trigger('reset');
		$("#nombre-editar").val(nombre)
		$("#apellidos-editar").val(apellidos)
		$("#ci-editar").val(ci)
		$("#placa-editar").val(placa)
		$("#color-editar").val(color)
		$("#marca-editar").val(marca)
		$("#categoria_visita-editar option:contains(" + id_categoria_visita + ")").attr("selected", true);
		$("#copropietario-editar option:contains(" + id_copropietario + ")").attr("selected", true);
		$('#modal-control').modal('show');



	})
	$('#form-editar').submit(function (e) {
		e.preventDefault();
		id_control_entrada_salida = parseInt(fila.find('td:eq(0)').text());
		nombre = $('#nombre-editar').val();
		apellidos = $('#apellidos-editar').val();
		ci = $('#ci-editar').val();
		id_categoria_visita = $('#categoria_visita-editar').val();
		placa = $('#placa-editar').val();
		color = $('#color-editar').val();
		marca = $('#marca-editar').val();
		id_copropietario = $('#copropietario-editar').val();
		hora_entrada = fila.find('td:eq(9)').text();
		hora_salida = fila.find('td:eq(10)').text();


		$.ajax({
			type: "POST",
			url: base_url + "Formularios/control/editarControl",
			data: {
				id_control_entrada_salida: id_control_entrada_salida,
				nombre: nombre,
				apellidos: apellidos,
				ci: ci,
				id_categoria_visita: id_categoria_visita,
				placa: placa,
				color: color,
				marca: marca,
				id_copropietario: id_copropietario,
			},
			dataType: "json",
			success: function (respuesta) {
				if (respuesta['respuesta'] === 'Exitoso') {
					id_control = respuesta['datos']['id_control_entrada_salida'];
					nombre = respuesta['datos']['nombre'];
					apellidos = respuesta['datos']['apellidos'];
					ci = respuesta['datos']['ci'];
					id_categoria_visita = respuesta['datos']['id_categoria_visita'];
					placa = respuesta['datos']['placa'];
					color = respuesta['datos']['color'];
					marca = respuesta['datos']['marca'];
					copropietario = respuesta['datos']['copropietario'];
					fecha_entrada = respuesta['datos']['fecha_hora_ingreso'];
					tabla_control.row(fila).data([id_control, nombre, apellidos, ci, id_categoria_visita, placa, color, marca, copropietario, hora_entrada, hora_salida]).draw();
					swal({
						title: 'Editado',
						text: respuesta['respuesta'],
						type: 'success'
					});

				} else {
					swal({
						title: 'Error',
						text: respuesta['respuesta'],
						type: 'error'
					});
				}

			}
		});

	});

	$(document).on('click', '.btn-print', function () {

		$("#modal-control .modal-body").print({
			title: 'Reporte',
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
