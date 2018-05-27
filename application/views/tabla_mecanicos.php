<?php 
    //CONSUMIMOS EL REST SERVER
    $mecanicos = json_decode(
        file_get_contents('http://localhost/restserver/api/taller/mecanicos/')
    );
//mecanicos
?>
<a href="<?php echo base_url(); ?>mecanicos/agregar" class="btn btn-success btn-flat btn-addon m-b-10 m-l-5"><i class="fa fa-plus m-r-5"></i>Agregar nuevo</a>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example23" class="display nowrap table table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Disponibilidad</th>
                                <th>Opciones</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($mecanicos){ ?>

                                <?php for ($i=0; $i < sizeof($mecanicos) ; $i++) { ?>
                                   <tr>
                                        <td><?php echo $mecanicos[$i]->id_mecanico; ?></td>
                                        <td><?php echo $mecanicos[$i]->nombre; ?></td>
                                        <td><?php echo "libre"; ?></td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>mecanicos/<?php echo $mecanicos[$i]->id_mecanico; ?>" class="btn btn-warning"><i class="ti-menu"></i></a>
                                            <a href="<?php echo base_url(); ?>mecanicos/<?php echo $mecanicos[$i]->id_mecanico; ?>/editar" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                            <button class="btn btn-danger btn sweet-confirm<?php echo $mecanicos[$i]->id_mecanico; ?>"><i class="fa fa-trash"></i></button>
                                            <script>
                                                document.querySelector('.sweet-confirm<?php echo $mecanicos[$i]->id_mecanico; ?>').onclick = function(){
                                                swal({
                                                        title: "¿Quieres borrar: <?php echo $mecanicos[$i]->nombre; ?>?",
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
                                                        window.location.href='<?php echo base_url(); ?>mecanicos/<?php echo $mecanicos[$i]->id_mecanico; ?>/borrar';
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
