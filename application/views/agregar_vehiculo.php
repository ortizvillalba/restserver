<?php 
    //CONSUMIMOS EL REST SERVER
    $clientes = json_decode(
        file_get_contents('http://localhost/restserver/api/taller/clientes/')
    );
//CLIENTES
?>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h2>Agregar Vehículo</h2>
                <div class="form-validation">
                    
                    <?php echo form_open("principal/agregar_vehiculo/", "id='form_editor'"); ?>
                        
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="marca">Seleccionar Cliente:</label>
                            <div class="col-lg-6">
                                <select name="id_cliente" id="id_cliente" class="form-control">
                                    <?php if($clientes){ ?>
                                        <?php for ($i=0; $i < sizeof($clientes) ; $i++) { ?>
                                                    <option value="<?php echo $clientes[$i]->id_cliente; ?>"><?php echo $clientes[$i]->id_cliente." - ".$clientes[$i]->nombre." ".$clientes[$i]->apellido; ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="marca">MARCA</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="marca">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="modelo">MODELO</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="modelo">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="matricula">MATRICULA</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="matricula">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="color">COLOR</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="color">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="anho">AÑO</label>
                            <div class="col-lg-6">
                                <input type="number" class="form-control" name="anho">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-lg-8 ml-auto">
                                <button type="submit" class="btn btn-succes">Agregar</button>
                                <a href="<?php echo base_url(); ?>vehiculos" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div>

            </div>
        </div>
    </div>
</div>