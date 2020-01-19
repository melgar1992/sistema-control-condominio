<!-- Content Wrapper. Contains page content -->
<div class="">
    <!-- Content Header (Page header) -->
    <div class="page_title">
        <h1>
            Copropietario
            <small></small>
        </h1>

    </div>
    

    <!-- Main content -->
    <div class="row">
        <div class="col-md-12 col-sm-12">

        <!-- Default box -->
        <div class="x_panel">
        <div class="x_tittle">

            <h3>Editar Copropietario</h3>


        </div>
        <div class="x_content">

            <?php if ($this->session->flashdata("error")) : ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dissmiss="alert" aria-hidden="true">$times;</button>
                    <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>

                </div>
            <?php endif; ?>
            <form method="POST" action="<?php echo base_url(); ?>Formularios/Copropietario/actualizarCopropietario" id="copropietario"  class="form-horizontal form-label-left" >
                <input type="hidden" value="<?php echo $copropietario->id_copropietario; ?>" name="id_copropietario">
                <input type="hidden" value="<?php echo $copropietario->id_persona; ?>" name="id_persona">

                <div class="form-group <?php echo !empty(form_error("nombre")) ? 'has-error' : ''; ?>">
                    <label for="nombre" class="control-label col-md-4 col-sm-3 col-xs-12">Nombres: <span class="required">*</span></label>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <input type="text" name="nombre" value="<?php echo !empty(form_error("nombre")) ? set_value("nombre") : $copropietario->nombres ?>" id=nombre required="required" class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
                        <?php echo form_error("nombre", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                    </div>
                </div>
                <div class="form-group <?php echo !empty(form_error("apellidos")) ? 'has-error' : ''; ?>">
                    <label for="apellidos" class="control-label col-md-4 col-sm-3 col-xs-12">Apellidos: <span class="required">*</span></label>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <input type="text" name="apellidos" value="<?php echo !empty(form_error("apellidos")) ? set_value("apellidos") : $copropietario->apellidos ?>" id=apellidos required="required" class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
                        <?php echo form_error("apellidos", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                    </div>
                </div>
                <<div class="form-group <?php echo !empty(form_error("ci")) ? 'has-error' : ''; ?>">
                    <label for="ci" class="control-label col-md-4 col-sm-3 col-xs-12">Carnet Identidad: <span class="required">*</span></label>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <input type="text" name="ci" value="<?php echo !empty(form_error("ci")) ? set_value("ci") : $copropietario->carnet_identidad ?>" id=ci required="required" class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
                        <?php echo form_error("ci", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                    </div>
        </div>
        <div class="form-group <?php echo !empty(form_error("telefono")) ? 'has-error' : ''; ?>">
            <label for="telefono" class="control-label col-md-4 col-sm-3 col-xs-12">Telefono: <span class="required">*</span></label>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <input type="text" name="telefono" value="<?php echo !empty(form_error("telefono")) ? set_value("telefono") : $copropietario->telefono ?>" id=telefono required="required" class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
                <?php echo form_error("telefono", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
            </div>
        </div>
        <div class="form-group <?php echo !empty(form_error("numero_vivienda")) ? 'has-error' : ''; ?>">
            <label for="numero_vivienda" class="control-label col-md-4 col-sm-3 col-xs-12">Numero Vivienda: <span class="required">*</span></label>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <input type="text" name="numero_vivienda" value="<?php echo !empty(form_error("numero_vivienda")) ? set_value("numero_vivienda") : $copropietario->numero_vivienda ?>" id=numero_vivienda required="required" class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
                <?php echo form_error("numero_vivienda", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
            </div>
        </div>
        <div class="form-group <?php echo !empty(form_error("calle")) ? 'has-error' : ''; ?>">
            <label for="calle" class="control-label col-md-4 col-sm-3 col-xs-12">Calle: <span class="required">*</span></label>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <input type="text" name="calle" value="<?php echo !empty(form_error("calle")) ? set_value("calle") : $copropietario->calle ?>" id=calle required="required" class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
                <?php echo form_error("calle", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
            </div>
        </div>
        <div class="form-group <?php echo !empty(form_error("numero_interno")) ? 'has-error' : ''; ?>">
            <label for="numero_interno" class="control-label col-md-4 col-sm-3 col-xs-12">Numero Interno: <span class="required">*</span></label>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <input type="text" name="numero_interno" value="<?php echo !empty(form_error("numero_interno")) ? set_value("numero_interno") : $copropietario->numero_interno ?>" id=numero_interno required="required" class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
                <?php echo form_error("numero_interno", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
            </div>
        </div>

        <div class="form-group">
            <label for="tipo_copropietario" class="control-label col-md-4 col-sm-3 col-xs-12">Tipo Copropietario: </label>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <select id="tipo_copropietario" required name="tipo_copropietario" class="form-control col-md-3 col-xs-12">
                    <option value=""></option>
                    <option value="Propietario" <?php echo ($copropietario->tipo_copropietario == 'Propietario') ? 'selected' : ''; ?>>Propietario</option>
                    <option value="Inquilino" <?php echo ($copropietario->tipo_copropietario == 'Inquilino') ? 'selected' : ''; ?>>Inquilino</option>

                </select>
                <?php echo form_error("tipo_copropietario", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
            </div>
        </div>
        <div class="in_solid"></div>

        <br>

        <div class="form-group">

            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <a href="<?php echo site_url("Formularios/Copropietario") ?>" class="btn btn-primary btn-flat">Volver</a>
                <button type="submit" id="guardar" class="btn btn-success">Editar</button>

            </div>
        </div>

        <div class="in_solid"></div>

        </form>


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->