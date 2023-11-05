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
                           <h2>Movilidades de propietarios</h2>
                           <ul class="nav navbar-right panel_toolbox">
                               <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                               </li>
                           </ul>
                           <div class="clearfix"></div>
                       </div>
                       <div class="x_content">
                           <h4>Para poder ingresar los vehiculos de los propietarios, primero hay que registrar a los mismos.</h4>
                           <h4>Todos los campos con * son obligatorios.</h4>
                           <form method="POST" action="<?php echo base_url(); ?>Formularios/Area_sociales/guardarReservaAreaSocial" id="control" class="form-horizontal form-label-left">
                               <input type="hidden" value="<?php echo $this->session->userdata('rol'); ?>" name="rol" id="rol">
                               <input type="hidden" value="" name="id_copropietario" id="id_copropietario">
                               <input type="hidden" value="" name="id_area_sociales" id="id_area_sociales">
                               <div class="form-group <?php echo !empty(form_error("nombre")) ? 'has-error' : ''; ?>">
                                   <label for="nombre" class="control-label col-md-4 col-sm-3 col-xs-12">Buscar nombres: <span class="required">*</span></label>
                                   <div class="col-md-4 col-sm-6 col-xs-12">
                                       <input type="text" name="nombre" value="<?php echo set_value('nombre') ?>" id=nombre required="required" class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
                                       <?php echo form_error("nombre", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                                   </div>
                               </div>
                               <div class="form-group <?php echo !empty(form_error("ci")) ? 'has-error' : ''; ?>">
                                   <label for="ci" class="control-label col-md-4 col-sm-3 col-xs-12">Buscar carnet de identidad: <span class="required">*</span></label>
                                   <div class="col-md-4 col-sm-6 col-xs-12">
                                       <input type="number" name="ci" value="<?php echo set_value('ci') ?>" id=ci required="required" class="form-control col-md-3 col-sm-3 col-xs-12">
                                       <?php echo form_error("ci", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                                   </div>
                               </div>
                               <div class="form-group <?php echo !empty(form_error("numero_vivienda")) ? 'has-error' : ''; ?>">
                                   <label for="numero_vivienda" class="control-label col-md-4 col-sm-3 col-xs-12">Numero de Vivienda:<span class="required">*</span></label>
                                   <div class="col-md-4 col-sm-6 col-xs-12">
                                       <input type="text" disabled name="numero_vivienda" value="<?php echo set_value('numero_vivienda') ?>" id=numero_vivienda required="required" class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
                                       <?php echo form_error("numero_vivienda", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                                   </div>
                               </div>
                               <div class="form-group <?php echo !empty(form_error("nombre_area_social")) ? 'has-error' : ''; ?>">
                                   <label for="nombre_area_social" class="control-label col-md-4 col-sm-3 col-xs-12">Buscar area social: <span class="required">*</span></label>
                                   <div class="col-md-4 col-sm-6 col-xs-12">
                                       <input type="text" name="nombre_area_social" value="<?php echo set_value('nombre_area_social') ?>" id='nombre_area_social' required="required" class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
                                       <?php echo form_error("nombre_area_social", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                                   </div>
                               </div>
                               <div class="form-group <?php echo !empty(form_error("invitados")) ? 'has-error' : ''; ?>">
                                   <label for="invitados" class="control-label col-md-4 col-sm-3 col-xs-12">Cantidad de invitados: <span class="required">*</span></label>
                                   <div class="col-md-4 col-sm-6 col-xs-12">
                                       <input type="number" name="invitados" value="<?php echo set_value('invitados') ?>" id=invitados required="required" class="form-control col-md-3 col-sm-3 col-xs-12">
                                       <?php echo form_error("ci", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                                   </div>
                               </div>
                               <div class="form-group <?php echo !empty(form_error("fecha_ini")) ? 'has-error' : ''; ?>">
                                   <label for="fecha_ini" class="control-label col-md-4 col-sm-3 col-xs-12">Fecha: *</label>
                                   <div class="col-md-4 col-sm-6 col-xs-12">
                                       <input type="date" value="<?php echo date("Y-m-d") ?>" required="required" name="fecha_ini" value="<?php echo set_value('fecha_ini') ?>" id=fecha_ini class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
                                       <?php echo form_error("fecha_ini", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
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
                                           <h2>Tabla vehiculos</h2>
                                           <ul class="nav navbar-right panel_toolbox">
                                               <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                               </li>
                                           </ul>
                                           <div class="clearfix"></div>
                                       </div>
                                       <div class="x_content">
                                           <table id="tabla_reservas" class="table table-bordered btn-hover">
                                               <thead>
                                                   <tr>
                                                       <th>Nombres Apellidos</th>
                                                       <th>Carnet identidad</th>
                                                       <th>numero_vivienda</th>
                                                       <th>Area Social</th>
                                                       <th>Cantidad invitados</th>
                                                       <th>Fecha</th>
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
                   <h4 class="modal-title">Editar Vehiculo</h4>
               </div>
               <div class="modal-body ui-front">
                   <form method="POST" action="<?php echo base_url(); ?>Formularios/Area_sociales/actualizarReservaAreaSocial" id="form-editar" class="form-horizontal form-label-left">
                       <input type="hidden" value="" name="id_reserva_area_social-editar" id="id_reserva_area_social-editar">
                       <input type="hidden" value="" name="id_area_sociales-editar" id="id_area_sociales-editar">
                       <input type="hidden" value="" name="id_copropietario-editar" id="id_copropietario-editar">

                       <div class="form-group <?php echo !empty(form_error("nombre-editar")) ? 'has-error' : ''; ?>">
                           <label for="nombre-editar" class="control-label col-md-4 col-sm-3 col-xs-12">Nombres: <span class="required">*</span></label>
                           <div class="col-md-5 col-sm-6 col-xs-12">
                               <input type="text" name="nombre-editar" value="<?php echo set_value('nombre') ?>" id=nombre-editar required="required" class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
                               <?php echo form_error("nombre-editar", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                           </div>
                       </div>
                       <div class="form-group <?php echo !empty(form_error("ci-editar")) ? 'has-error' : ''; ?>">
                           <label for="ci-editar" class="control-label col-md-4 col-sm-3 col-xs-12">Carnet de Identidad: <span class="required">*</span></label>
                           <div class="col-md-5 col-sm-6 col-xs-12">
                               <input type="number" name="ci-editar" value="<?php echo set_value('ci-editar') ?>" id=ci-editar required="required" class="form-control col-md-3 col-sm-3 col-xs-12">
                               <?php echo form_error("ci-editar", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                           </div>
                       </div>
                       <div class="form-group <?php echo !empty(form_error("numero_vivienda-editar")) ? 'has-error' : ''; ?>">
                           <label for="numero_vivienda-editar" class="control-label col-md-4 col-sm-3 col-xs-12">Numero de Vivienda: <span class="required">*</span></label>
                           <div class="col-md-5 col-sm-6 col-xs-12">
                               <input type="text" disabled name="numero_vivienda-editar" value="<?php echo set_value('numero_vivienda-editar') ?>" id=numero_vivienda-editar required="required" class="form-control col-md-3 col-sm-3 col-xs-12">
                               <?php echo form_error("numero_vivienda-editar", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                           </div>
                       </div>
                       <div class="form-group <?php echo !empty(form_error("nombre_area_social-editar")) ? 'has-error' : ''; ?>">
                           <label for="nombre_area_social-editar" class="control-label col-md-4 col-sm-3 col-xs-12">Area social: <span class="required">*</span></label>
                           <div class="col-md-5 col-sm-6 col-xs-12">
                               <input type="text"  name="nombre_area_social-editar" value="<?php echo set_value('nombre_area_social-editar') ?>" id=nombre_area_social-editar required="required" class="form-control col-md-3 col-sm-3 col-xs-12">
                               <?php echo form_error("nombre_area_social-editar", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                           </div>
                       </div>
                       <div class="form-group <?php echo !empty(form_error("invitados-editar")) ? 'has-error' : ''; ?>">
                           <label for="invitados-editar" class="control-label col-md-4 col-sm-3 col-xs-12">Cantidad invitados: <span class="required">*</span></label>
                           <div class="col-md-5 col-sm-6 col-xs-12">
                               <input type="number" name="invitados-editar" value="<?php echo set_value('invitados-editar') ?>" id=invitados-editar required="required" class="form-control col-md-3 col-sm-3 col-xs-12">
                               <?php echo form_error("invitados-editar", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                           </div>
                       </div>
                       <div class="form-group <?php echo !empty(form_error("fecha_ini-editar")) ? 'has-error' : ''; ?>">
                           <label for="fecha_ini-editar" class="control-label col-md-4 col-sm-3 col-xs-12">Fecha: <span class="required">*</span></label>
                           <div class="col-md-5 col-sm-6 col-xs-12">
                               <input type="date" name="fecha_ini-editar" value="<?php echo set_value('fecha_ini-editar') ?>" id=fecha_ini-editar required="required" class="form-control col-md-3 col-sm-3 col-xs-12">
                               <?php echo form_error("fecha_ini-editar", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                           </div>
                       </div>

                       <div class="ln_solid"></div>
                       <div class="form-group">

                           <div class="col-md-4 col-sm-6 col-xs-12 col-md-offset-5">
                               <button class="btn btn-primary btn-flat" type="reset">Borrar</button>
                               <button type="submit" id="editar" class="btn btn-warning">Editar</button>

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