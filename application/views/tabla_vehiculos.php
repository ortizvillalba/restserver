<?php 
    //CONSUMIMOS EL REST SERVER
    $vehiculos = json_decode(
        file_get_contents('http://localhost/restserver/api/taller/vehiculos/')
    );

?>
<?php if($this->mensaje){ ?>
    <div class="alert alert-<?php echo $this->mensaje[1]; ?> alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <?php echo $this->mensaje[0]; ?>
    </div>
<?php } ?>
<a href="<?php echo base_url(); ?>vehiculo/agregar" class="btn btn-success btn-flat btn-addon m-b-10 m-l-5"><i class="fa fa-plus m-r-5"></i>Agregar nuevo</a>
<div class="row">
    <div class="col-12">
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
                                <th>Cliente</th>
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
                                        <td><span class="badge badge-info" style="padding:8px; margin:1px;"><?php echo $vehiculos[$i]->nombre; ?></span></td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>vehiculo/<?php echo $vehiculos[$i]->id_vehiculo; ?>" class="btn btn-warning"><i class="ti-menu"></i></a>
                                            <a href="<?php echo base_url(); ?>vehiculo/<?php echo $vehiculos[$i]->id_vehiculo; ?>/editar" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                           
                                            <button class="btn btn-danger btn sweet-confirm<?php echo $vehiculos[$i]->id_vehiculo; ?>"><i class="fa fa-trash"></i></button>
                                            <script>
                                                document.querySelector('.sweet-confirm<?php echo $vehiculos[$i]->id_vehiculo; ?>').onclick = function(){
                                                swal({
                                                        title: "¿Quieres borrar: <?php echo $vehiculos[$i]->marca; ?> <?php echo $vehiculos[$i]->modelo; ?>?",
                                                        text: "Ya no podras recuperar esta información!!",
                                                        type: "warning",
                                                        showCancelButton: true,
                                                        confirmButtonColor: "#DD6B55",
                                                        confirmButtonText: "Si, eliminalo!!",
                                                        cancelButtonText: "Cancelar",
                                                        closeOnConfirm: false
                                                    },
                                                    function(){

                                                        swal("Eliminado !!", "ha sido eliminado", "success");
                                                        window.location.href='<?php echo base_url(); ?>vehiculo/<?php echo $vehiculos[$i]->id_vehiculo; ?>/borrar';
                                                    });
                                            };
                                            </script>
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

