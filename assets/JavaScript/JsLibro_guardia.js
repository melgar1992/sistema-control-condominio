$(document).ready(function () {
    var base_url = $("#base_url").val();
    nivel_usuario = $('#rol').val();
    if (nivel_usuario != 'guardia') {
        $('#acta').prop("disabled", true);
    };
    var tabla = $('#Actas_tabla').DataTable({
        responsive: true,
        pageLength: 25,
        ajax: { url: base_url + "Formularios/Libro_guardia/getActasAjax", dataSrc: "" },
        columns: [
            { data: 'nombre_apellidos' },
            { data: 'fecha' },
            { data: 'carnet_identidad' },
            { data: 'id_usuarios', visible: false },
            { data: 'acta', visible: false },
            { data: 'id_libro_guardia' },
        ],
        "order": [
            [1, "desc"]
        ],
        "columnDefs": [{
            "targets": -1,
            "data": 'id_libro_guardia',
            "render": function (data, type, row, meta) {
                return "<div class='text-right'> <div class='btn-group'><button class='btn btn-primary btn-reporte-transporte-cliente btn-sm' value='" + data + "' id='btn-editar'><i class='fa fa-archive'></i> Ver</button><button class='btn btn-danger btn-sm' value='" + data + "' id='btn-borrar'><i class='fas fa-trash-alt'></i> Borrar</button></div></div>";
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
    $(document).on('click', '#btn-editar', function (event) {

        fila = $(this).closest('tr');
        id_reserva_area_social = event.target.value;
        acta = tabla.cell(fila, 4).data();

        $('#form-editar').trigger('reset');
        $("#acta-editar").val(acta);
        $('#modal-control').modal('show');

    });
    $(document).on('click', '#btn-borrar', function () {
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
                    url: base_url + 'Formularios/Libro_guardia/borrarActa/' + id,
                    type: 'POST',
                    success: function (resp) {

                        window.location.href = base_url + resp;
                    }
                })


            }
        })

    });
});