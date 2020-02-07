<!-- Content Wrapper. Contains page content -->

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
                        <form method="POST" action="<?php echo base_url(); ?>Formularios/Categoria_visita/actualizarCategoria" id="copropietario" class="form-horizontal form-label-left">
                            <input type="hidden" value="<?php echo $categoria_visita->id_categoria_visita; ?>" name="id_categoria_visita">

                            <div class="form-group <?php echo !empty(form_error("nombre")) ? 'has-error' : ''; ?>">
                                <label for="nombre" class="control-label col-md-4 col-sm-3 col-xs-12">Nombres: <span class="required">*</span></label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="text" name="nombre" value="<?php echo !empty(form_error("nombre")) ? set_value("nombre") : $categoria_visita->nombre ?>" id=nombre required="required" class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
                                    <?php echo form_error("nombre", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                                </div>
                            </div>
                            <div class="form-group <?php echo !empty(form_error("descripcion")) ? 'has-error' : ''; ?>">
                                <label for="descripcion" class="control-label col-md-4 col-sm-3 col-xs-12">descripcions <span class="required">*</span></label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <textarea type="text" name="descripcion" value="" id=descripcion required="required" class="form-control col-md-3 col-sm-3 col-xs-12" placeholder=""><?php echo !empty(form_error("descripcion")) ? set_value("descripcion") : $categoria_visita->descripcion ?></textarea>
                                    <?php echo form_error("descripcion", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                                </div>
                            </div>
                          
                            <div class="in_solid"></div>

                            <br>

                            <div class="form-group">

                                <div class="col-md-4 col-sm-6 col-xs-12 col-md-offset-5">
                                    <a href="<?php echo site_url("Formularios/Categoria_visita") ?>" class="btn btn-primary btn-flat">Volver</a>
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