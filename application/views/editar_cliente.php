<?php if($detalles_cliente){ ?>
    <?php foreach ($detalles_cliente as $cliente) { ?>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h2>Editar Cliente</h2>
                        <div class="form-validation">
                            
                            <?php echo form_open("principal/editar_cliente/".$cliente['id_cliente'], "id='form_editor'"); ?>
                                
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="dni">DNI</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="dni" value="<?php echo $cliente['dni']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nombre">Nombre</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="nombre" value="<?php echo $cliente['nombre']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="apellido">Apellido</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="apellido" value="<?php echo $cliente['apellido']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="direccion">Dirección</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="direccion" value="<?php echo $cliente['direccion']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="telefono">Teléfono</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="telefono" value="<?php echo $cliente['telefono']; ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" class="btn btn-succes">Editar</button>
                                        <a href="<?php echo base_url(); ?>clientes" class="btn btn-danger">Cancelar</a>
                                    </div>
                                </div>
                            <?php echo form_close(); ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
<?php } ?>