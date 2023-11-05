$(document).ready(function () {
    var base_url = $("#base_url").val();
    var tabla = $('#tabla_reservas').DataTable({
        responsive: true,
        pageLength: 25,
        ajax: { url: base_url + "Formularios/Area_sociales/obtenerReservacionesAreaSociales", dataSrc: "" },
        columns: [
            { data: 'nombre_apellidos' },
            { data: 'carnet_identidad' },
            { data: 'numero_vivienda' },
            { data: 'nombre_area_social' },
            { data: 'invitados' },
            { data: 'fecha_ini' },
            { data: 'id_area_sociales', visible: false },
            { data: 'id_copropietario', visible: false },
            { data: 'id_reserva_area_social' },
        ],
        "order": [
            [0, "desc"]
        ],
        "columnDefs": [{
            "targets": -1,
            "data": 'id_copropietario',
            "render": function (data, type, row, meta) {
                return "<div class='text-right'> <div class='btn-group'><button class='btn btn-warning btn-sm' value='" + data + "' id='btn-editar'><i class='fas fa-pencil-alt'></i> Editar</button><button class='btn btn-danger btn-sm' value='" + data + "' id='btn-borrar'><i class='fas fa-trash-alt'></i> Borrar</button></div></div>";
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
});