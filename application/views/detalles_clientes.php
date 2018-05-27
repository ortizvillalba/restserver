<?php if($detalle_cliente){ ?>
    <?php foreach ($detalle_cliente as $cliente) { ?>
        <?php 
            //CONSUMIMOS EL REST SERVER
            $vehiculos = json_decode(
                file_get_contents('http://localhost/restserver/index.php/api/taller/misvehiculos/'.$cliente['id_cliente'])
            );
            

        //mecanicos
        ?>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>clientes">Clientes</a></li>
            <li class="breadcrumb-item active"><?php echo $cliente['nombre']." ".$cliente['apellido']; ?></li>
        </ol>
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        
                            <h3><?php echo $cliente['nombre']." ".$cliente['apellido']; ?></h3>
                            
                            <div class="desc">
                                    
                                <div class="table-responsive">
                                    <table class="table" style="text-align: left;">
                                        <tbody>
                                            <tr>
                                                <td><b>Código Cliente</b></td>
                                                <td style="text-align: left;"><?php echo $cliente['id_cliente']; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>DNI</b></td>
                                                <td style="text-align: left;"><?php echo $cliente['dni']; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Dirección</b></td>
                                                <td style="text-align: left;"><?php echo $cliente['direccion']; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Teléfono</b></td>
                                                <td style="text-align: left;"><?php echo $cliente['telefono']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            
                             <a href="<?php echo base_url(); ?>vehiculo/<?php echo $cliente['id_cliente']; ?>/agregar" class="btn btn-success btn-flat btn-addon m-b-10 m-l-5"><i class="fa fa-plus m-r-5"></i>Agregar nuevo vehículo</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example23" class="display nowrap table table-hover" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Marca</th>
                                        <th>Modelo</th>
                                        <th>Matricula</th>
                                        <th>Color</th>
                                        <th>Año</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($vehiculos){ ?>
                                        <?php for ($i=0; $i < sizeof($vehiculos) ; $i++) { ?>
                                        <tr>
                                                <td><?php echo $vehiculos[$i]->id_vehiculo; ?></td>
                                                <td><?php echo $vehiculos[$i]->marca; ?></td>
                                                <td><?php echo $vehiculos[$i]->modelo; ?></td>
                                                <td><?php echo $vehiculos[$i]->matricula; ?></td>
                                                <td><?php echo $vehiculos[$i]->color; ?></td>
                                                <td><?php echo $vehiculos[$i]->anho; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url(); ?>vehiculo/<?php echo $vehiculos[$i]->id_vehiculo; ?>" class="btn btn-warning"><i class="ti-menu"></i></a>
                                                    <a href="<?php echo base_url(); ?>vehiculo/<?php echo $vehiculos[$i]->id_vehiculo; ?>/editar" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
<?php } ?>