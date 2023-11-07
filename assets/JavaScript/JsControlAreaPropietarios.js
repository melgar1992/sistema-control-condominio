$(document).ready(function () {
    var base_url = $("#base_url").val();
    var tabla = $('#tabla_control').DataTable({
        responsive: true,
        pageLength: 25,
        ajax: { url: base_url + "Formularios/Control_area_copropietarios/obtenerControlAreasPropietariosAjax", dataSrc: "" },
        columns: [
            { data: 'nombre_apellidos' },
            { data: 'carnet_identidad' },
            { data: 'numero_vivienda' },
            { data: 'nombre_area_social' },
            { data: 'fecha_ini' },
            { data: 'fecha_fin' },
            { data: 'id_area_sociales', visible: false },
            { data: 'id_copropietario', visible: false },
            { data: 'id_control_area_copropietario' },
        ],
        "order": [
            [4, "desc"]
        ],
        "columnDefs": [{
            "targets": -1,
            "data": 'id_copropietario',
            "render": function (data, type, row, meta) {
                return " <div class='btn-group'><button type='button' id='btn-salida' title='Marcar salida' value='" + data + "' class='btn-sm btn-success btn-salida'><span class='fa fa-sign-out'></span></button><button class='btn-sm btn-warning btn-editar' value='" + data + "' id='btn-editar'><i class='fa fa-pencil'></i></button><button class='btn-sm btn-danger btn-borrar' value='" + data + "' id='btn-borrar'><i class='fa fa-remove'></i></button></div>";
            }
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
        }
    });
    $("#nombre").autocomplete({
        source: function (request, response) {
            $.ajax({
                url: base_url + "Formularios/Copropietario/buscarCopropietariosAjax",
                type: "POST",
                dataType: "json",
                data: {
                    valor: request.term
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        minLength: 3,
        select: function (event, ui) {
            data = ui.item.label + " " + ui.item.apellidos;
            id_copropietario = ui.item.id_copropietario;
            $('#id_copropietario').val(id_copropietario);
            $('#ci').val(ui.item.carnet_identidad);
            $("#numero_vivienda").val(ui.item.numero_vivienda);
        },
    });
    $("#ci").autocomplete({
        source: function (request, response) {
            $.ajax({
                url: base_url + "Formularios/Copropietario/buscarCopropietariosXCarner_identidadAjax",
                type: "POST",
                dataType: "json",
                data: {
                    valor: request.term
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        minLength: 3,
        select: function (event, ui) {
            data = ui.item.label;
            id_copropietario = ui.item.id_copropietario;
            $('#id_copropietario').val(id_copropietario);
            $('#nombre').val(ui.item.nombres + " " + ui.item.apellidos);
            $("#numero_vivienda").val(ui.item.numero_vivienda);
        },
    });
    $("#nombre_area_social").autocomplete({
        source: function (request, response) {
            $.ajax({
                url: base_url + "Formularios/Area_sociales/buscarAreaSocialAjax",
                type: "POST",
                dataType: "json",
                data: {
                    valor: request.term
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        minLength: 3,
        select: function (event, ui) {
            data = ui.item.label;
            $('#nombre_area_social').val(data);
            $('#id_area_sociales').val(ui.item.id_area_sociales);
        },
    });
    $('#control').submit(function (e) {
        e.preventDefault();
        id_area_sociales = $('#id_area_sociales').val();
        id_copropietario = $('#id_copropietario').val();

        $.ajax({
            type: "POST",
            url: base_url + "Formularios/Control_area_copropietarios/guardarControlArea",
            data: {
                id_area_sociales: id_area_sociales,
                id_copropietario: id_copropietario,
            },
            dataType: "json",
            success: function (respuesta) {
                if (respuesta['respuesta'] === 'Exitoso') {
                    nombre_apellidos = respuesta['datos']['nombre_apellidos'];
                    carnet_identidad = respuesta['datos']['carnet_identidad'];
                    numero_vivienda = respuesta['datos']['numero_vivienda'];
                    nombre_area_social = respuesta['datos']['nombre_area_social'];
                    fecha_ini = respuesta['datos']['fecha_ini'];
                    fecha_fin = respuesta['datos']['fecha_fin'];
                    id_area_sociales = respuesta['datos']['id_area_sociales'];
                    id_copropietario = respuesta['datos']['id_copropietario'];
                    id_control_area_copropietario = respuesta['datos']['id_control_area_copropietario'];
                    tabla.row.add({
                        "nombre_apellidos": nombre_apellidos,
                        "carnet_identidad": carnet_identidad,
                        "numero_vivienda": numero_vivienda,
                        "nombre_area_social": nombre_area_social,
                        "fecha_ini": fecha_ini,
                        "fecha_fin": fecha_fin,
                        "id_area_sociales": id_area_sociales,
                        "id_copropietario": id_copropietario,
                        "id_control_area_copropietario": id_control_area_copropietario,

                    }).draw();
                    swal({
                        title: 'Guardar',
                        text: respuesta['respuesta'],
                        type: 'success'
                    });
                    $('#fcontrol').trigger('reset');
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
    $(document).on('click', '#btn-editar', function (event) {

        fila = $(this).closest('tr');
        id_control_area_copropietario = event.target.value;
        nombre = tabla.cell(fila, 0).data();
        ci = tabla.cell(fila, 1).data();
        numero_vivienda = tabla.cell(fila, 2).data();
        nombre_area_social = tabla.cell(fila, 3).data();
        id_area_sociales = tabla.cell(fila, 6).data();
        id_copropietario = tabla.cell(fila, 7).data();


        $('#form-editar').trigger('reset');
        $("#id_area_sociales-editar").val(id_area_sociales);
        $("#id_copropietario-editar").val(id_copropietario);
        $("#id_reserva_area_social-editar").val(id_control_area_copropietario);
        $("#nombre-editar").val(nombre);
        $("#ci-editar").val(ci);
        $("#numero_vivienda-editar").val(numero_vivienda);
        $("#nombre_area_social-editar").val(nombre_area_social);
        $('#modal-control').modal('show');

    });
    $("#nombre-editar").autocomplete({
        source: function (request, response) {
            $.ajax({
                url: base_url + "Formularios/Copropietario/buscarCopropietariosAjax",
                type: "POST",
                dataType: "json",
                data: {
                    valor: request.term
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        minLength: 3,
        select: function (event, ui) {
            data = ui.item.label;
            id_copropietario = ui.item.id_copropietario;
            $('#id_copropietario-editar').val(id_copropietario);
            $('#ci-editar').val(ui.item.carnet_identidad);
            $("#numero_vivienda-editar").val(ui.item.numero_vivienda);
        },
    });
    $("#ci-editar").autocomplete({
        source: function (request, response) {
            $.ajax({
                url: base_url + "Formularios/Copropietario/buscarCopropietariosXCarner_identidadAjax",
                type: "POST",
                dataType: "json",
                data: {
                    valor: request.term
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        minLength: 3,
        select: function (event, ui) {
            data = ui.item.label;
            id_copropietario = ui.item.id_copropietario;
            $('#id_copropietario-editar').val(id_copropietario);
            $('#nombre-editar').val(ui.item.nombres + " " + ui.item.apellidos);
            $("#numero_vivienda-editar").val(ui.item.numero_vivienda);
        },
    });
    $("#nombre_area_social-editar").autocomplete({
        source: function (request, response) {
            $.ajax({
                url: base_url + "Formularios/Area_sociales/buscarAreaSocialAjax",
                type: "POST",
                dataType: "json",
                data: {
                    valor: request.term
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        minLength: 3,
        select: function (event, ui) {
            data = ui.item.label;
            $('#nombre_area_social-editar').val(data);
            $('#id_area_sociales-editar').val(ui.item.id_area_sociales);
        },
    });
    $('#form-editar').submit(function (e) {
        e.preventDefault();
        id_area_sociales = $('#id_area_sociales-editar').val();
        id_copropietario = $('#id_copropietario-editar').val();
        id_control_area_copropietario = $('#id_reserva_area_social-editar').val();
        $.ajax({
            type: "POST",
            url: base_url + "Formularios/Control_area_copropietarios/actualizarControlArea",
            data: {
                id_area_sociales: id_area_sociales,
                id_copropietario: id_copropietario,
                id_control_area_copropietario: id_control_area_copropietario,
            },
            dataType: "json",
            success: function (respuesta) {
                if (respuesta['respuesta'] === 'Exitoso') {
                    nombre_apellidos = respuesta['datos']['nombre_apellidos'];
                    carnet_identidad = respuesta['datos']['carnet_identidad'];
                    numero_vivienda = respuesta['datos']['numero_vivienda'];
                    nombre_area_social = respuesta['datos']['nombre_area_social'];
                    fecha_ini = respuesta['datos']['fecha_ini'];
                    fecha_fin = respuesta['datos']['fecha_fin'];
                    id_area_sociales = respuesta['datos']['id_area_sociales'];
                    id_copropietario = respuesta['datos']['id_copropietario'];
                    id_control_area_copropietario = respuesta['datos']['id_control_area_copropietario'];
                    tabla.row(fila).data({
                        "nombre_apellidos": nombre_apellidos,
                        "carnet_identidad": carnet_identidad,
                        "numero_vivienda": numero_vivienda,
                        "nombre_area_social": nombre_area_social,
                        "fecha_ini": fecha_ini,
                        "fecha_fin": fecha_fin,
                        "id_area_sociales": id_area_sociales,
                        "id_copropietario": id_copropietario,
                        "id_control_area_copropietario": id_control_area_copropietario,

                    }).draw();
                    swal({
                        title: 'Guardar',
                        text: respuesta['respuesta'],
                        type: 'success'
                    });
                    $('#modal-control').modal('hide');
                    $('#form-editar').trigger('reset');

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
    $(document).on('click', '.btn-borrar', function (event) {
        Swal.fire({
            title: 'Esta seguro de elimar?',
            text: "El control se eliminara, una vez eliminado no se recuperara!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, deseo elimniar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.value) {

                fila = $(this).closest('tr');
                id = tabla.cell(fila, 8).data();
                $.ajax({
                    url: base_url + "Formularios/Control_area_copropietarios/borrarControl/" + id,
                    type: 'POST',
                    success: function (respuesta) {
                        tabla.row(fila).remove().draw();
                        swal({
                            title: 'Eliminado',
                            text: 'Se borro correctamente',
                            type: 'success'
                        });


                    }
                })


            }
        })

    });
    $(document).on('click', '.btn-salida', function () {
		fila = $(this).closest('tr');
		id = tabla.cell(fila, 8).data();
		control_salida = fila.find('td:eq(5)').text();
		if (control_salida === '') {
			$.ajax({
				type: "POST",
				url: base_url + "Formularios/Control_area_copropietarios/marcarSalida",
				data: {
					id: id,
				},
				dataType: "json",
				success: function (respuesta) {
					if (respuesta['respuesta'] === 'Exitoso') {
						fecha_fin = respuesta['datos']['fecha_fin'];
						tabla.cell(fila, 5).data(fecha_fin).draw();
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
});