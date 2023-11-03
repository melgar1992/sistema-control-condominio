$(document).ready(function () {
    var base_url = $("#base_url").val();
    var tabla = $('#tabla_vehiculos').DataTable({
        responsive: true,
        pageLength: 25,
        ajax: { url: base_url + "Formularios/Movilidades_propietarios/obtenerMovilidadesAjax", dataSrc: "" },
        columns: [
            { data: 'nombres' },
            { data: 'apellidos' },
            { data: 'telefono' },
            { data: 'numero_vivienda' },
            { data: 'calle' },
            { data: 'placa' },
            { data: 'marca' },
            { data: 'color' },
            { data: 'id_copropietario' }
        ],
        "order": [
            [0, "desc"]
        ],
        "columnDefs": [{
            "targets": -1,
            "data": 'id_copropietario',
            "render": function (data, type, row, meta) {
                return "<div class='text-right'> <div class='btn-group'><button class='btn btn-warning btn-sm' value='" + data + "' id='btn-editar'><i class='fas fa-pencil-alt'></i> Editar</button><button class='btn btn-danger btn-sm' id='btn-borrar'><i class='fas fa-trash-alt'></i> Borrar</button></div></div>";
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


    $(document).on('click', '.btn-borrar', function () {
        Swal.fire({
            title: 'Esta seguro de elimar?',
            text: "Una vez elimina se perderan lso datos!",
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
                    url: base_url + 'Formularios/Copropietario/borrar/' + id,
                    type: 'POST',
                    success: function (resp) {

                        window.location.href = base_url + resp;
                    }
                })


            }
        })

    })


})