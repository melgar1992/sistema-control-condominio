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
                    <h2>Dashboard</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <a href="<?php echo base_url() ?>Formularios/Control">
                          <div class="tile-stats">
                            <div class="icon"><i class="fa fa-arrow-circle-right"></i>
                            </div>
                            <div class="count"><?php echo count($visitas_mes) ; ?></div>

                            <h3>Control de ingreso</h3>
                            <p>Ingreso al condominio del mes.</p>
                          </div>
                        </a>
                      </div>
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <a href="<?php echo base_url(); ?>Formularios/Copropietario">
                          <div class="tile-stats">
                            <div class="icon"><i class="fa fa-group"></i>
                            </div>
                            <div class="count"><?php echo count($copropietarios) ; ?></div>

                            <h3>Copropietarios</h3>
                            <p>Copropietarios del condominio</p>
                          </div>
                        </a>
                      </div>
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <a href="<?php echo base_url(); ?>Formularios/Usuarios">
                          <div class="tile-stats">
                            <div class="icon"><i class="fa fa-user"></i>
                            </div>
                            <div class="count"><?php echo count($usuarios) ; ?></div>

                            <h3>Usuarios Activos</h3>
                            <p>Administrar a los usuarios</p>
                          </div>
                        </a>
                      </div>
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <a href="<?php echo base_url() ?>Formularios/Categoria_visita">
                          <div class="tile-stats">
                            <div class="icon"><i class="fa fa-check-square-o"></i>
                            </div>
                            <div class="count"><?php echo count($categoria_visitas) ; ?></div>

                            <h3>Categorias de visitas</h3>
                            <p>Administrar las categorias de las visitas</p>
                          </div>
                        </a>
                      </div>
                    </div>
                    <hr>
                    </hr>
                    
                    <div class="row">
                    <h4>Seleccione las fechas para filtrar los controles.</h4>
                      <form action="<?php echo current_url(); ?>" method="POST" class="form-horizontal">
                        <div class="form-group">
                          <label for="" class="col-md-1 control-label">Desde: </label>
                          <div class="col-md-3">
                            <input type="date" class="form-control" name="fechainicio" value="<?php echo !empty($fechainicio) ? $fechainicio : ''; ?>">

                          </div>
                          <label for="" class="col-md-1 control-label">Hasta: </label>
                          <div class="col-md-3">
                            <input type="date" class="form-control" name="fechafin" value="<?php echo !empty($fechafin) ? $fechafin : ''; ?>">

                          </div class="col-md-4">
                          <input type="submit" name="buscar" value="Buscar" class="btn btn-primary">
                          <a href="<?php echo base_url(); ?>" class="btn btn-danger">Restablecer</a>
                        </div>
                      </form>

                    </div>
                    <hr>
                    </hr>
                    
                    <div class="col-md-12">
                      <table id="example" class="table table-bordered btn-hover">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Carnet de Indentidad</th>
                            <th>Categoria Visita</th>
                            <th>Placa</th>
                            <th>Color</th>
                            <th>Marca</th>
                            <th>Copropietario</th>
                            <th>Fecha hora Ingreso</th>
                            <th>Fecha hora Salida</th>
                            <th>Usuario responsable</th>

                          </tr>
                        </thead>
                        <tbody>
                          <?php if (!empty($control_visitas)) : ?>
                            <?php foreach ($control_visitas as $control_visita) : ?>

                              <tr>
                                <td><?php echo $control_visita->id_control_entrada_salida; ?></td>
                                <td><?php echo $control_visita->nombres; ?></td>
                                <td><?php echo $control_visita->apellidos; ?></td>
                                <td><?php echo $control_visita->carnet_identidad; ?></td>
                                <td><?php echo $control_visita->nombre_visita; ?></td>
                                <td><?php echo $control_visita->placa; ?></td>
                                <td><?php echo $control_visita->color; ?></td>
                                <td><?php echo $control_visita->marca; ?></td>
                                <td><?php echo $control_visita->nombre_copropietario . ' ' . $control_visita->apellidos_copropietario; ?></td>
                                <td><?php echo $control_visita->fecha_hora_ingreso; ?></td>
                                <td><?php echo $control_visita->fecha_hora_salida; ?></td>
                                <td><?php echo $control_visita->nombre_usuarios . ' ' . $control_visita->apellidos_usuarios; ?></td>
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
        <!-- /page content -->