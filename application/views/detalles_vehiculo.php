<?php if($detalle_vehiculo){ ?>
    <?php foreach ($detalle_vehiculo as $vehiculo) { ?>
        
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>vehiculos">vehiculos</a></li>
            <li class="breadcrumb-item active"><?php echo $vehiculo['marca']." ".$vehiculo['modelo']; ?></li>
        </ol>
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        
                            <h3><?php echo $vehiculo['marca']." - ".$vehiculo['modelo']; ?></h3>
                            
                           
                                    
                            <div class="table-responsive">
                                <table class="table" style="text-align: left;">
                                    <tbody>
                                        <tr>
                                            <td><b>Código Vehículo</b></td>
                                            <td style="text-align: left;"><?php echo $vehiculo['id_vehiculo']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Marca</b></td>
                                            <td style="text-align: left;"><?php echo $vehiculo['marca']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Modelo</b></td>
                                            <td style="text-align: left;"><?php echo $vehiculo['modelo']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Color</b></td>
                                            <td style="text-align: left;"><?php echo $vehiculo['color']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Matricula</b></td>
                                            <td style="text-align: left;"><?php echo $vehiculo['matricula']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Año</b></td>
                                            <td style="text-align: left;"><?php echo $vehiculo['anho']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Cliente</b></td>
                                            <td style="text-align: left;"><span class="badge badge-info" style="padding:8px; margin:1px;"><?php echo "<b>".$vehiculo['nombre']." ".$vehiculo['apellido']."</b>"; ?></span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
<?php } ?>