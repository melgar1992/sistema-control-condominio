<!-- page content -->
<div class="right_col" role="main" style="min-height: 950px;">
    <div class="">
        <div class="page-title">
        </div>

        <div class="clearfix"></div>

        <!-- Main content -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <!-- Default box -->
                <div class="x_panel">
                    <div class="x_tittle">
                        <h2>Formulario de Copropietarios</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <h4>Los campos con * son obligatorios.</h4>
                        <br></br>
                        <?php if ($this->session->flashdata("error")) : ?>
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dissmiss="alert" aria-hidden="true">$times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>

                            </div>
                        <?php endif; ?>
                        <form method="POST" action="<?php echo base_url(); ?>Formularios/Copropietario/guardarCopropietario" id="copropietario" class="form-horizontal form-label-left">


                            <div class="form-group <?php echo !empty(form_error("nombre")) ? 'has-error' : ''; ?>">
                                <label for="nombre" class="control-label col-md-4 col-sm-3 col-xs-12">Nombres: <span class="required">*</span></label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="text" name="nombre" value="<?php echo set_value('nombre') ?>" id=nombre required="required" class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
                                    <?php echo form_error("nombre", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                                </div>
                            </div>
                            <div class="form-group <?php echo !empty(form_error("apellidos")) ? 'has-error' : ''; ?>">
                                <label for="apellidos" class="control-label col-md-4 col-sm-3 col-xs-12">Apellidos: <span class="required">*</span></label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="text" name="apellidos" value="<?php echo set_value('apellidos') ?>" id=apellidos required="required" class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
                                    <?php echo form_error("apellidos", "<span class='help-block col-md-4 col-xs-12 '>", "</span>"); ?>
                                </div>
                            </div>
                            <div class="form-group <?php echo !empty(form_error("ci")) ? 'has-error' : ''; ?>">
                                <label for="ci" class="control-label col-md-4 col-sm-3 col-xs-12">Carnet de Identidad: <span class="required">*</span></label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="number" name="ci" value="<?php echo set_value('ci') ?>" id=ci required="required" class="form-control col-md-3 col-sm-3 col-xs-12">
                                    <?php echo form_error("ci", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                                </div>
                            </div>
                            <div class="form-group <?php echo !empty(form_error("telefono")) ? 'has-error' : ''; ?>">
                                <label for="telefono" class="control-label col-md-4 col-sm-3 col-xs-12">Numero de Telefono:<span class="required">*</span></label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="number" name="telefono" value="<?php echo set_value('telefono') ?>" id=telefono required="required" class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
                                    <?php echo form_error("telefono", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                                </div>
                            </div>
                            <div class="form-group <?php echo !empty(form_error("numero_vivienda")) ? 'has-error' : ''; ?>">
                                <label for="numero_vivienda" class="control-label col-md-4 col-sm-3 col-xs-12">Numero de Vivienda:<span class="required">*</span></label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="text" name="numero_vivienda" value="<?php echo set_value('numero_vivienda') ?>" id=numero_vivienda required="required" class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
                                    <?php echo form_error("numero_vivienda", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                                </div>
                            </div>
                            <div class="form-group <?php echo !empty(form_error("calle")) ? 'has-error' : ''; ?>">
                                <label for="calle" class="control-label col-md-4 col-sm-3 col-xs-12">Calle:<span class="required">*</span></label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="text" name="calle" value="<?php echo set_value('calle') ?>" id=calle required="required" class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
                                    <?php echo form_error("calle", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                                </div>
                            </div>
                            <div class="form-group <?php echo !empty(form_error("numero_interno")) ? 'has-error' : ''; ?>">
                                <label for="numero_interno" class="control-label col-md-4 col-sm-3 col-xs-12">Numero Interno:<span class="required">*</span></label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="number" name="numero_interno" value="<?php echo set_value('numero_interno') ?>" id=numero_interno required="required" class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
                                    <?php echo form_error("calle", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tipo_copropietario" class="control-label col-md-4 col-sm-3 col-xs-12">Tipo Copropietario: * </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <select id="tipo_copropietario" required name="tipo_copropietario"  required="required" class="form-control col-md-3 col-xs-12">
                                        <option value=""></option>
                                        <option value="Propietario">Propietario</option>
                                        <option value="Inquilino">Inquilino</option>
                                    </select>
                                    <?php echo form_error("tipo_copropietario", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="estado_propietario" class="control-label col-md-4 col-sm-3 col-xs-12">Estado: *</label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <select id="estado_propietario" required name="estado_propietario"  required="required" class="form-control col-md-3 col-xs-12">
                                        <option value="Activo">Activo</option>
                                        <option value="Obersvacion">Obersvacion</option>
                                        <option value="Mora">Mora</option>
                                    </select>
                                    <?php echo form_error("estado_propietario", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                                </div>
                            </div>


                            <div class="in_solid"></div>

                            <br>

                            <div class="form-group">

                                <div class="col-md-4 col-sm-6 col-xs-12 col-md-offset-5">
                                    <button class="btn btn-primary btn-flat" type="reset">Borrar</button>
                                    <button type="submit" id="guardar" class="btn btn-success">Guardar</button>

                                </div>
                            </div>


                            <div class="in_solid"></div>

                        </form>
                        <!-- Default box -->
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Tabla de Copropietario</h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <table id="example1" class="table table-bordered btn-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nombres</th>
                                                    <th>Apellidos</th>
                                                    <th>Carnet de Indentidad</th>
                                                    <th>Telefono</th>
                                                    <th>Numero Vivienda</th>
                                                    <th>Calle</th>
                                                    <th>Numero Interno</th>
                                                    <th>Tipo Copropietario</th>
                                                    <th>Estado</th>
                                                    <th>Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($copropietarios)) : ?>
                                                    <?php foreach ($copropietarios as $copropietario) : ?>

                                                        <tr>
                                                            <td><?php echo $copropietario->id_copropietario; ?></td>
                                                            <td><?php echo $copropietario->nombres; ?></td>
                                                            <td><?php echo $copropietario->apellidos; ?></td>
                                                            <td><?php echo $copropietario->carnet_identidad; ?></td>
                                                            <td><?php echo $copropietario->telefono; ?></td>
                                                            <td><?php echo $copropietario->numero_vivienda; ?></td>
                                                            <td><?php echo $copropietario->calle; ?></td>
                                                            <td><?php echo $copropietario->numero_interno; ?></td>
                                                            <td><?php echo $copropietario->tipo_copropietario; ?></td>
                                                            <td><?php echo $copropietario->estado_propietario; ?></td>


                                                            <td>
                                                                <div class="btn-group">

                                                                    <a href="<?php echo base_url() ?>Formularios/Copropietario/editar/<?php echo $copropietario->id_copropietario; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                                    <button type="button" value="<?php echo $copropietario->id_copropietario; ?>" class="btn btn-danger btn-borrar"><span class="fa fa-remove"></span></button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>

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






<!-- /.content-wrapper -->
<div class="modal fade" id="modal-default">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span></button>

                <h4 class="modal-title">Informacion del Producto</h4>

            </div>

            <div class="modal-body">

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
            </div>

        </div>

        <!-- /.modal-content -->

    </div>

    <!-- /.modal-dialog -->

</div>

<!-- /.modal -->