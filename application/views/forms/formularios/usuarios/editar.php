<!-- Content Wrapper. Contains page content -->
<div class="right_col" role="main" style="min-height: 950px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">

            </div>
        </div>

        <div class="clearfix"></div>
        <!-- Default box -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Editar Coopropietario</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <?php if ($this->session->flashdata("error")) : ?>
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dissmiss="alert" aria-hidden="true">$times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>

                            </div>
                        <?php endif; ?>
                        <form method="POST" action="<?php echo base_url(); ?>Formularios/Usuarios/actualizarUsuario" id="usuario" class="form-horizontal form-label-left">
                            <input type="hidden" value="<?php echo $usuario->id_usuarios; ?>" name="id_usuarios">

                            <div class="form-group <?php echo !empty(form_error("nombre")) ? 'has-error' : ''; ?>">
                                <label for="nombre" class="control-label col-md-4 col-sm-3 col-xs-12">Nombres: <span class="required">*</span></label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="text" name="nombre" value="<?php echo !empty(form_error("nombre")) ? set_value("nombre") : $usuario->nombres ?>" id=nombre required="required" class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
                                    <?php echo form_error("nombre", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                                </div>
                            </div>
                            <div class="form-group <?php echo !empty(form_error("apellidos")) ? 'has-error' : ''; ?>">
                                <label for="apellidos" class="control-label col-md-4 col-sm-3 col-xs-12">Apellidos: <span class="required">*</span></label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="text" name="apellidos" value="<?php echo !empty(form_error("apellidos")) ? set_value("apellidos") : $usuario->apellidos ?>" id=apellidos required="required" class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
                                    <?php echo form_error("apellidos", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                                </div>
                            </div>
                            <div class="form-group <?php echo !empty(form_error("ci")) ? 'has-error' : ''; ?>">
                                <label for="ci" class="control-label col-md-4 col-sm-3 col-xs-12">Carnet Identidad: <span class="required">*</span></label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="text" name="ci" value="<?php echo !empty(form_error("ci")) ? set_value("ci") : $usuario->carnet_identidad ?>" id=ci required="required" class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
                                    <?php echo form_error("ci", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                                </div>
                            </div>
                            <div class="form-group <?php echo !empty(form_error("telefono")) ? 'has-error' : ''; ?>">
                                <label for="telefono" class="control-label col-md-4 col-sm-3 col-xs-12">Numero de telefono: <span class="required">*</span></label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="text" name="telefono" value="<?php echo !empty(form_error("telefono")) ? set_value("telefono") : $usuario->telefono ?>" id=telefono required="required" class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
                                    <?php echo form_error("telefono", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                                </div>
                            </div>
                            <div class="form-group <?php echo !empty(form_error("nombre_usuario")) ? 'has-error' : ''; ?>">
                                <label for="nombre_usuario" class="control-label col-md-4 col-sm-3 col-xs-12">Nombre de usuario: <span class="required">*</span></label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="text" name="nombre_usuario" value="<?php echo !empty(form_error("nombre_usuario")) ? set_value("nombre_usuario") : $usuario->username ?>" id=nombre_usuario required="required" class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
                                    <?php echo form_error("nombre_usuario", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                                </div>
                            </div>
                            <div class="form-group <?php echo !empty(form_error("contrasena")) ? 'has-error' : ''; ?>">
                                <label for="contrasena" class="control-label col-md-4 col-sm-3 col-xs-12">contrasena:</label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="password" autocomplete="new-password" name="contrasena" value="<?php echo  set_value('contrasena') ?>" id=contrasena  class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
                                    <?php echo form_error("contrasena", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                                </div>
                            </div>
                            <div class="form-group <?php echo !empty(form_error("fecha_ingreso")) ? 'has-error' : ''; ?>">
                                <label for="fecha_ingreso" class="control-label col-md-4 col-sm-3 col-xs-12">fecha ingreso: <span class="required">*</span></label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="date" name="fecha_ingreso" value="<?php echo !empty(form_error("fecha_ingreso")) ? set_value("fecha_ingreso") : $usuario->fecha_ingreso ?>" id=fecha_ingreso required="required" class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
                                    <?php echo form_error("fecha_ingreso", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="roles" class="control-label col-md-4 col-sm-3 col-xs-12">Nivel de usuario : </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <select id="roles" required name="roles" class="form-control col-md-3 col-xs-12">
                                        <option value=""></option>
                                        <option value="administrador total" <?php echo ($usuario->tiporol == 'administrador total') ? 'selected' : ''; ?>>Administrador total</option>
                                        <option value="administrador condominio" <?php echo ($usuario->tiporol == 'administrador condominio') ? 'selected' : ''; ?>>Administrador del condominio</option>
                                        <option value="guardia" <?php echo ($usuario->tiporol == 'guardia') ? 'selected' : ''; ?>>Guardia</option>
                                    </select>
                                    <?php echo form_error("roles", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                                </div>
                            </div>
                            <div class="in_solid"></div>

                            <br>

                            <div class="form-group">

                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a href="<?php echo site_url("Formularios/Usuarios") ?>" class="btn btn-primary btn-flat">Volver</a>
                                    <button type="submit" id="guardar" class="btn btn-success">Editar</button>

                                </div>
                            </div>



                        </form>


                        </section>
                        <!-- /.content -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->