$(document).ready(function () {
    var base_url = $("#base_url").val();
    nivel_usuario = $('#rol').val();

    var tabla = $('#Area_social_table').DataTable({
        responsive: true,
        pageLength: 25,
        ajax: { url: base_url + "Formularios/Area_sociales/obtenerAreasSocialesAjax", dataSrc: "" },
        columns: [
            { data: 'nombre_area_social', width: '70%' },
            { data: 'id_area_sociales' },
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

    $(document).on('click', '#btn-editar', function (event) {

        fila = $(this).closest('tr');
        nombre = fila.find('td:eq(0)').text();
        id_area_sociales = $(this).val();
        $('#form-editar').trigger('reset');
        $("#nombre-editar").val(nombre);
        $("#id_area_sociales").val(id_area_sociales);
        $('#modal-control').modal('show');

    });
    $(document).on('click', '#btn-borrar', function() {
        Swal.fire({
            title: 'Esta seguro de elimar?',
            text: "Una vez elimina el copropietario tambien se eliminaran todos los datos relacionados con el!",
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
                    url: base_url + 'Formularios/Area_sociales/borrar/' + id,
                    type: 'POST',
                    success: function(resp) {
                        window.location.href = base_url + resp;
                    }
                })


            }
        })

    })
});