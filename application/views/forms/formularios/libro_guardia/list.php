   <!-- page content -->
   <div class="right_col" role="main" style="min-height: 950px;">
       <div class="">
           <div class="page-title">

           </div>

           <div class="clearfix"></div>
           <!-- Default box -->
           <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                   <div class="x_panel">
                       <div class="x_title">
                           <h2>Actas de guardias</h2>
                           <ul class="nav navbar-right panel_toolbox">
                               <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                               </li>
                           </ul>
                           <div class="clearfix"></div>
                       </div>
                       <div class="x_content">
                           <h4></h4>
                           <form method="POST" action="<?php echo base_url(); ?>Formularios/Libro_guardia/guardarActa" id="control" class="form-horizontal form-label-left">
                               <input type="hidden" value="<?php echo $this->session->userdata('rol'); ?>" name="rol" id="rol">

                               <div class="form-group <?php echo !empty(form_error("nombre")) ? 'has-error' : ''; ?>">
                                   <label for="nombre" class="control-label col-md-4 col-sm-3 col-xs-12">Acta: <span class="required">*</span></label>
                                   <div class="col-md-4 col-sm-6 col-xs-12">
                                       <textarea maxlength="1500" name="acta" id="acta" class="form-control col-md-3 col-sm-3 col-xs-12" require cols="30" rows="10"></textarea>
                                       <?php echo form_error("nombre", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                                   </div>
                               </div>

                               <div class="ln_solid"></div>

                               <div class="form-group">

                                   <div class="col-md-4 col-sm-6 col-xs-12 col-md-offset-5">
                                       <button class="btn btn-primary btn-flat" type="reset">Borrar</button>
                                       <button type="submit" id="guardar" class="btn btn-success">Guardar</button>

                                   </div>
                               </div>
                           </form>

                           <div class="ln_solid"></div>

                           <!-- Box de la tabla -->
                           <div class="row">
                               <div class="col-md-12 col-sm-12 col-xs-12">
                                   <div class="x_panel">
                                       <div class="x_title">
                                           <h2>Tabla de registros</h2>
                                           <ul class="nav navbar-right panel_toolbox">
                                               <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                               </li>
                                           </ul>
                                           <div class="clearfix"></div>
                                       </div>
                                       <div class="x_content">
                                           <table id="Actas_tabla" class="table table-bordered btn-hover">
                                               <thead>
                                                   <tr>
                                                       <th>Nombres</th>
                                                       <th>Fecha</th>
                                                       <th>ci</th>
                                                       <th></th>
                                                       <th></th>
                                                       <th>Opciones</th>
                                                   </tr>
                                               </thead>
                                               <tbody>
                                               </tbody>
                                           </table>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <!-- /page content -->

   <div class="modal fade" id="modal-control">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span></button>
                   <h4 class="modal-title">Editar</h4>
               </div>
               <div class="modal-body ui-front">
                   <form method="POST" action="<?php echo base_url(); ?>" id="form-editar" class="form-horizontal form-label-left">

                       <input type="hidden" value="" name="id_area_sociales" id="id_area_sociales">

                       <div class="form-group <?php echo !empty(form_error("nombre")) ? 'has-error' : ''; ?>">
                           <label for="nombre" class="control-label col-md-2 col-sm-2 col-xs-12">Acta: <span class="required">*</span></label>
                           <div class="col-md-8 col-sm-8 col-xs-12">
                               <textarea disabled maxlength="1500" name="acta-editar" id="acta-editar" class="form-control col-md-8 col-sm-8 col-xs-12" require cols="30" rows="15"></textarea>
                               <?php echo form_error("acta-editar", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                           </div>
                       </div>
                   </form>

               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                   <button type="button" class="btn btn-primary btn-print"><span class="fa fa-print">Imprimir</span></button>
               </div>
           </div>
           <!-- /.modal-content -->
       </div>
       <!-- /.modal-dialog -->
   </div>