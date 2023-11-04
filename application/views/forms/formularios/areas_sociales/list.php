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
                           <h2>Areas sociales de condominio</h2>
                           <ul class="nav navbar-right panel_toolbox">
                               <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                               </li>
                           </ul>
                           <div class="clearfix"></div>
                       </div>
                       <div class="x_content">
                           <h4>Todos los campos con * son obligatorios.</h4>
                           <form method="POST" action="<?php echo base_url(); ?>Formularios/Usuarios/guardarUsuario" id="control" class="form-horizontal form-label-left">
                               <input type="hidden" value="<?php echo $this->session->userdata('rol'); ?>" name="rol" id="rol">

                               <div class="form-group <?php echo !empty(form_error("nombre")) ? 'has-error' : ''; ?>">
                                   <label for="nombre" class="control-label col-md-4 col-sm-3 col-xs-12">Nombre: <span class="required">*</span></label>
                                   <div class="col-md-4 col-sm-6 col-xs-12">
                                       <input type="text" name="nombre" value="<?php echo set_value('nombre') ?>" id=nombre required="required" class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
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
                                           <table id="control_tabla" class="table table-bordered btn-hover">
                                               <thead>
                                                   <tr>
                                                       <th>Nombres</th>
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
                   <h4 class="modal-title">Editar Control</h4>
               </div>
               <div class="modal-body">
                   <form method="POST" action="<?php echo base_url(); ?>Formularios/control/editarControl" id="form-editar" class="form-horizontal form-label-left">


                       <div class="form-group <?php echo !empty(form_error("nombre-editar")) ? 'has-error' : ''; ?>">
                           <label for="nombre-editar" class="control-label col-md-4 col-sm-3 col-xs-12">Nombres: <span class="required">*</span></label>
                           <div class="col-md-4 col-sm-6 col-xs-12">
                               <input type="text" name="nombre-editar" value="<?php echo set_value('nombre') ?>" id=nombre-editar required="required" class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
                               <?php echo form_error("nombre-editar", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                           </div>
                       </div>
                       <div class="form-group <?php echo !empty(form_error("apellidos-editar")) ? 'has-error' : ''; ?>">
                           <label for="apellidos-editar" class="control-label col-md-4 col-sm-3 col-xs-12">Apellidos: <span class="required">*</span></label>
                           <div class="col-md-4 col-sm-6 col-xs-12">
                               <input type="text" name="apellidos-editar" value="<?php echo set_value('apellidos-editar') ?>" id=apellidos-editar required="required" class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
                               <?php echo form_error("apellidos-editar", "<span class='help-block col-md-4 col-xs-12 '>", "</span>"); ?>
                           </div>
                       </div>
                       <div class="form-group <?php echo !empty(form_error("ci-editar")) ? 'has-error' : ''; ?>">
                           <label for="ci-editar" class="control-label col-md-4 col-sm-3 col-xs-12">Carnet de Identidad: <span class="required">*</span></label>
                           <div class="col-md-4 col-sm-6 col-xs-12">
                               <input type="number" name="ci-editar" value="<?php echo set_value('ci-editar') ?>" id=ci-editar required="required" class="form-control col-md-3 col-sm-3 col-xs-12">
                               <?php echo form_error("ci-editar", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                           </div>
                       </div>
                       <div class="form-group <?php echo !empty(form_error("categoria_visita-editar")) ? 'has-error' : ''; ?>">
                           <label for="categoria_visita-editar" class="control-label col-md-4 col-sm-3 col-xs-12">Tipos de categoria: <span class="required">*</span></label>
                           <div class="col-md-4 col-sm-6 col-xs-12">
                               <select name="categoria_visita-editar" id="categoria_visita-editar" required class="form-control col-md-3 col-sm-3 col-xs-12">
                                   <option value=""></option>
                                   <?php foreach ($categoria_visitas as $categoria_visita) : ?>
                                       <option value="<?php echo $categoria_visita->id_categoria_visita; ?>"><?php echo $categoria_visita->nombre; ?></option>
                                   <?php endforeach; ?>
                               </select>
                               <?php echo form_error("categoria_visita-editar", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                           </div>
                       </div>
                       <div class="form-group <?php echo !empty(form_error("placa-editar")) ? 'has-error' : ''; ?>">
                           <label for="placa-editar" class="control-label col-md-4 col-sm-3 col-xs-12">Numero de placa:</label>
                           <div class="col-md-4 col-sm-6 col-xs-12">
                               <input type="text" name="placa-editar" value="<?php echo set_value('placa-editar') ?>" id=placa-editar class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
                               <?php echo form_error("placa-editar", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                           </div>
                       </div>
                       <div class="form-group <?php echo !empty(form_error("color-editar")) ? 'has-error' : ''; ?>">
                           <label for="color-editar" class="control-label col-md-4 col-sm-3 col-xs-12">Color:</label>
                           <div class="col-md-4 col-sm-6 col-xs-12">
                               <input type="text" name="color-editar" value="<?php echo set_value('color-editar') ?>" id=color-editar class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
                               <?php echo form_error("color-editar", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                           </div>
                       </div>
                       <div class="form-group <?php echo !empty(form_error("marca-editar")) ? 'has-error' : ''; ?>">
                           <label for="marca-editar" class="control-label col-md-4 col-sm-3 col-xs-12">Marca de auto:</label>
                           <div class="col-md-4 col-sm-6 col-xs-12">
                               <input type="text" name="marca-editar" value="<?php echo set_value('marca-editar') ?>" id=marca-editar class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
                               <?php echo form_error("marca-editar", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                           </div>
                       </div>
                       <div class="form-group <?php echo !empty(form_error("copropietario-editar")) ? 'has-error' : ''; ?>">
                           <label for="copropietario-editar" class="control-label col-md-4 col-sm-3 col-xs-12">Copropietario : <span class="required">*</span></label>
                           <div class="col-md-4 col-sm-6 col-xs-12">
                               <select name="copropietario-editar" id="copropietario-editar" required class="form-control col-md-3 col-sm-3 col-xs-12">
                                   <option value=""></option>
                                   <?php foreach ($copropietarios as $copropietario) : ?>
                                       <option value="<?php echo $copropietario->id_copropietario; ?>"><?php echo $copropietario->nombres . ' ' . $copropietario->apellidos; ?></option>
                                   <?php endforeach; ?>
                               </select>
                               <?php echo form_error("copropietario-editar", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
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