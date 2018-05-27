<?php 
    //CONSUMIMOS EL REST SERVER
    $clientes = json_decode(
        file_get_contents('http://localhost/restserver/api/taller/clientes/')
    );
//CLIENTES
?>
<a href="<?php echo base_url(); ?>clientes/agregar" class="btn btn-success btn-flat btn-addon m-b-10 m-l-5"><i class="fa fa-plus m-r-5"></i>Agregar nuevo</a>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example23" class="display nowrap table table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>DNI</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($clientes){ ?>

                                <?php for ($i=0; $i < sizeof($clientes) ; $i++) { ?>
                                   <tr>
                                        <td><?php echo $clientes[$i]->id_cliente; ?></td>
                                        <td><?php echo $clientes[$i]->dni; ?></td>
                                        <td><?php echo $clientes[$i]->nombre; ?></td>
                                        <td><?php echo $clientes[$i]->apellido; ?></td>
                                        <td><?php echo $clientes[$i]->direccion; ?></td>
                                        <td><?php echo $clientes[$i]->telefono; ?></td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>clientes/<?php echo $clientes[$i]->id_cliente; ?>" class="btn btn-warning"><i class="ti-menu"></i></a>
                                            <a href="<?php echo base_url(); ?>clientes/<?php echo $clientes[$i]->id_cliente; ?>/editar" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                            <button class="btn btn-danger btn sweet-confirm<?php echo $clientes[$i]->id_cliente; ?>"><i class="fa fa-trash"></i></button>
                                            <script>
                                                document.querySelector('.sweet-confirm<?php echo $clientes[$i]->id_cliente; ?>').onclick = function(){
                                                swal({
                                                        title: "¿Quieres borrar: <?php echo $clientes[$i]->nombre; ?> <?php echo $clientes[$i]->apellido; ?>?",
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
                                                        window.location.href='<?php echo base_url(); ?>clientes/<?php echo $clientes[$i]->id_cliente; ?>/borrar';
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
