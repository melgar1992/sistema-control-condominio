        <!-- page content -->
        <div class="right_col" role="main" style="min-height: 950px;">
          <div class="">

            <div class="clearfix"></div>
            <!-- Default box -->
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Formulario de categorias</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p>Llenar todos los campos con * que son obligatorios</p>
                    <form method="POST" action="<?php echo base_url(); ?>Formularios/Categoria_visita/guardarCategoria" id="categoria_ingreso" class="form-horizontal form-label-left">


                      <div class="form-group <?php echo !empty(form_error("nombre")) ? 'has-error' : ''; ?>">
                        <label for="nombre" class="control-label col-md-4 col-sm-3 col-xs-12">Nombre de la categoria: <span class="required">*</span></label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input type="text" name="nombre" value="<?php echo set_value('nombre') ?>" id=nombre required="required" class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
                          <?php echo form_error("nombre", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                      </div>
                      <div class="form-group <?php echo !empty(form_error("descripcion")) ? 'has-error' : ''; ?>">
                        <label for="descripcion" class="control-label col-md-4 col-sm-3 col-xs-12">Descripcion: <span class="required">*</span></label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <textarea rows='2' name="descripcion" value="<?php echo set_value('descripcion') ?>" id=descripcion required="required" class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="Una breve descripcion de la categoria"></textarea>
                          <?php echo form_error("descripcion", "<span class='help-block col-md-4 col-xs-12 '>", "</span>"); ?>
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

                    <!-- Box de la tabla -->
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Tabla de Categorias de Ingreso</h2>

                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                            <table id="example1" class="table table-bordered btn-hover">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Nombres</th>
                                  <th>Descripcion</th>
                                  <th>Opciones</th>

                                </tr>
                              </thead>
                              <tbody>
                                <?php if (!empty($categorias_visitas)) : ?>
                                  <?php foreach ($categorias_visitas as $categoria_visita) : ?>

                                    <tr>
                                      <td><?php echo $categoria_visita->id_categoria_visita; ?></td>
                                      <td><?php echo $categoria_visita->nombre; ?></td>
                                      <td><?php echo $categoria_visita->descripcion; ?></td>



                                      <td>
                                        <div class="btn-group">

                                          <a href="<?php echo base_url() ?>Formularios/Categoria_visita/editar/<?php echo $categoria_visita->id_categoria_visita; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                          <button type="button" value="<?php echo $categoria_visita->id_categoria_visita; ?>" class="btn btn-danger btn-borrar"><span class="fa fa-remove"></span></button>
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