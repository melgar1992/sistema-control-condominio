        <!-- page content -->
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
                    <h2>Administracion de usuarios</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    En este formulario usted podra adminsitrar los usuarios que tiene acceso a la aplicacion.
                    <!--Formulario del usuario-->
                    <h4>Los campos con * son obligatorios.</h4>
                    <br> </br>
                    <?php if ($this->session->flashdata("error")) : ?>
                      <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dissmiss="alert" aria-hidden="true">$times;</button>
                        <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>

                      </div>
                    <?php endif; ?>
                    <form method="POST" action="<?php echo base_url(); ?>Formularios/Usuarios/guardarUsuario" id="usuario" class="form-horizontal form-label-left">


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
                      <div class="form-group <?php echo !empty(form_error("nombre_usuario")) ? 'has-error' : ''; ?>">
                        <label for="nombre_usuario" class="control-label col-md-4 col-sm-3 col-xs-12">Nombre de usuario:<span class="required">*</span></label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input type="text" autocomplete="new-password" name="nombre_usuario" value="<?php echo set_value('nombre_usuario') ?>" id=nombre_usuario required="required" class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
                          <?php echo form_error("nombre_usuario", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                      </div>
                      <div class="form-group <?php echo !empty(form_error("contrasena")) ? 'has-error' : ''; ?>">
                        <label for="contrasena" class="control-label col-md-4 col-sm-3 col-xs-12">contrasena:<span class="required">*</span></label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input type="password" autocomplete="new-password" name="contrasena" value="<?php echo set_value('contrasena') ?>" id=contrasena required="required" class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
                          <?php echo form_error("contrasena", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                      </div>
                      <div class="form-group <?php echo !empty(form_error("fecha_ingreso")) ? 'has-error' : ''; ?>">
                        <label for="fecha_ingreso" class="control-label col-md-4 col-sm-3 col-xs-12">Fecha Ingreso:<span class="required">*</span></label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input type="date" name="fecha_ingreso" value="<?php echo set_value('fecha_ingreso') ?>" id=fecha_ingreso required="required" class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
                          <?php echo form_error("fecha_ingreso", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="roles" class="control-label col-md-4 col-sm-3 col-xs-12">Nivel de usuario: </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <select id="roles" required name="roles" class="form-control col-md-3 col-xs-12">
                            <option value=""></option>
                            <option value="administrador total">Administrador total</option>
                            <option value="administrador condominio">Administrador del condominio</option>
                            <option value="guardia">Guardia</option>

                          </select>
                          <?php echo form_error("roles", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                      </div>


                      <div class="ln_solid"></div>

                      <div class="form-group">

                        <div class="col-md-4 col-sm-6 col-xs-12 col-md-offset-5">
                          <button class="btn btn-primary btn-flat" type="reset">Borrar</button>
                          <button type="submit" id="guardar" class="btn btn-success">Guardar</button>

                        </div>
                      </div>


                      <div class="ln_solid"></div>

                    </form>
                    <!-- Box de la tabla -->
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Tabla de Usuarios</h2>
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
                                  <th>Nombre de usuario</th>
                                  <th>Fecha Ingreso</th>

                                  <th>Rol del sistema</th>
                                  <th>Opciones</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php if (!empty($Usuarios)) : ?>
                                  <?php foreach ($Usuarios as $usuario) : ?>

                                    <tr>
                                      <td><?php echo $usuario->id_usuarios; ?></td>
                                      <td><?php echo $usuario->nombres; ?></td>
                                      <td><?php echo $usuario->apellidos; ?></td>
                                      <td><?php echo $usuario->carnet_identidad; ?></td>
                                      <td><?php echo $usuario->telefono; ?></td>
                                      <td><?php echo $usuario->username; ?></td>
                                      <td><?php echo $usuario->fecha_ingreso; ?></td>
                                      <td><?php echo $usuario->tiporol; ?></td>


                                      <td>
                                        <div class="btn-group">

                                          <a href="<?php echo base_url() ?>Formularios/Usuarios/editar/<?php echo $usuario->id_usuarios; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                          <button type="button" value="<?php echo $usuario->id_usuarios; ?>" class="btn btn-danger btn-borrar"><span class="fa fa-remove"></span></button>
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
        <!-- /page content -->