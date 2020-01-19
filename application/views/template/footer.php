    <!-- footer content -->
    <footer>
      <div class="pull-right">

      </div>
      <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->
    </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/template/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>assets/template/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>assets/template/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url(); ?>assets/template/nprogress/nprogress.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url(); ?>assets/template/build/js/custom.min.js"></script>
    
    <script src="<?php echo base_url(); ?>assets/template/chartjs/Chart.js"></script>
<input type="hidden" value="<?php echo base_url() ?>" id="base_url">
<script>
  $('#example1').DataTable({
    responsive: "true",
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
  $('.sidebar-menu').tree();
</script>
<script>
  
</script>

    <?php
    if (isset($pagina)) { ?>
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/template/JavaScript/Js<?php echo $pagina; ?>.js"></script>
    <?php
    }

    ?>

    </body>

    </html>