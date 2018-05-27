<?php 
    //CONSUMIMOS EL REST SERVER
    $clientes = json_decode(
        file_get_contents('http://localhost/restserver/api/taller/clientes/')
    );
//CLIENTES
?>
<?php if($this->mensaje){ ?>
    <div class="alert alert-<?php echo $this->mensaje[1]; ?> alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times" data-original-title="" title=""></i></button>
        <?php echo $this->mensaje[0]; ?>
    </div>
<?php } ?>
<?php if($detalles_vehiculo){ ?>
    <?php foreach ($detalles_vehiculo as $vehiculo) {?>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h2>Editar vehiculo</h2>
                        <div class="form-validation">
                            
                            <?php echo form_open("principal/editar_vehiculo/".$vehiculo['id_vehiculo'], "id='form_editor'"); ?>
                        
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="marca">Seleccionar Cliente:</label>
                                    <div class="col-lg-6">
                                        <select name="id_cliente" id="id_cliente">
                                            <?php if($clientes){ ?>
                                                <?php for ($i=0; $i < sizeof($clientes) ; $i++) { ?>
                                                            <option value="<?php echo $clientes[$i]->id_cliente; ?>" <?php if ($vehiculo['id_cliente']==$clientes[$i]->id_cliente) { echo "selected"; } ?>><?php echo $clientes[$i]->id_cliente." - ".$clientes[$i]->nombre." ".$clientes[$i]->apellido; ?></option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" name="id_vehiculo" value="<?php echo  $vehiculo['id_vehiculo'] ?>">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="marca">MARCA</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="marca" value="<?php echo $vehiculo['marca'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="modelo">MODELO</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="modelo" value="<?php echo $vehiculo['modelo'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="matricula">MATRICULA</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="matricula" value="<?php echo $vehiculo['matricula'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="color">COLOR</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="color" value="<?php echo $vehiculo['color'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="anho">AÑO</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="anho" value="<?php echo $vehiculo['anho'] ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" class="btn btn-succes">Editar</button>
                                        <a href="<?php echo base_url(); ?>vehiculos" class="btn btn-danger">Cancelar</a>
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