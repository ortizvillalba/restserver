<?php if($detalle_mecanico){ ?>
    <?php foreach ($detalle_mecanico as $mecanico) { ?>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>mecanicos">mecanicos</a></li>
            <li class="breadcrumb-item active"><?php echo $mecanico['nombre']; ?></li>
        </ol>
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        
                            <h3><?php echo $mecanico['nombre']; ?></h3>
                            
                            <div class="desc">
                                    
                                <div class="table-responsive">
                                    <table class="table" style="text-align: left;">
                                        <tbody>
                                            <tr>
                                                <td><b>Código mecanico</b></td>
                                                <td style="text-align: left;"><?php echo $mecanico['id_mecanico']; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Nombre</b></td>
                                                <td style="text-align: left;"><?php echo $mecanico['nombre']; ?></td>
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