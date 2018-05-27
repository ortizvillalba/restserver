<!-- Start Page Content -->
<div class="row">
    <div class="col-lg-8">
        <div class="row">
            <?php if(isset($cant_mis_indicadores) && $cant_mis_indicadores){ ?>
            <div class="col-lg-6">
                <div class="card bg-primary p-30">
                    <div class="media widget-ten">
                        <div class="media-left meida media-middle">
                            <span><i class="ti-bag f-s-40"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <p class="m-b-0">Indicadores asignados</p>
                            <h2 class="color-white m-t-0"><?php echo $cant_mis_indicadores; ?></h2>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php if(isset($cant_total_indicadores) && $cant_total_indicadores){ ?>
            <div class="col-md-6">
                <div class="card bg-success  p-30">
                    <div class="media widget-ten">
                        <div class="media-left meida media-middle">
                            <span><i class="fa fa-chart-pie f-s-40"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <p class="m-b-0">Total de Indicadores</p>
                            <h2 class="color-white m-t-0"><?php echo $cant_total_indicadores; ?></h2>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="year-calendar"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body browser">
                        <p class="f-w-600">Progreso de trabajos en la semana <span class="pull-right">85%</span></p>
                        <div class="progress ">
                            <div role="progressbar" style="width: 85%; height:8px;" class="progress-bar bg-danger wow animated progress-animated"> <span class="sr-only">60% Complete</span> </div>
                        </div>

                        <p class="m-t-30 f-w-600">Mecánicos disponibles<span class="pull-right">90%</span></p>
                        <div class="progress">
                            <div role="progressbar" style="width: 90%; height:8px;" class="progress-bar bg-info wow animated progress-animated"> <span class="sr-only">60% Complete</span> </div>
                        </div>

                        <p class="m-t-30 f-w-600">Repuestos disponibles<span class="pull-right">65%</span></p>
                        <div class="progress">
                            <div role="progressbar" style="width: 65%; height:8px;" class="progress-bar bg-success wow animated progress-animated"> <span class="sr-only">60% Complete</span> </div>
                        </div>

                        <p class="m-t-30 f-w-600">Samsung<span class="pull-right">65%</span></p>
                        <div class="progress">
                            <div role="progressbar" style="width: 65%; height:8px;" class="progress-bar bg-warning wow animated progress-animated"> <span class="sr-only">60% Complete</span> </div>
                        </div>

                        <p class="m-t-30 f-w-600">android<span class="pull-right">65%</span></p>
                        <div class="progress m-b-30">
                            <div role="progressbar" style="width: 65%; height:8px;" class="progress-bar bg-success wow animated progress-animated"> <span class="sr-only">60% Complete</span> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card bg-dark">
            <div class="testimonial-widget-one p-17">
                <div class="testimonial-widget-one owl-carousel owl-theme">
                    <div class="item">
                        <div class="testimonial-content">
                            <div class="testimonial-author">lorem ipsum</div>
                            <div class="testimonial-author-position">(Tercera Reunión)</div>

                            <div class="testimonial-text">
                                <i class="fa fa-quote-left"></i>  El gobierno electrónico constituye un instrumento fundamental para la mejora de la eficiencia, la eficacia, la transparencia en la gestión pública y la promoción de la participación ciudadana favoreciendo la prestación de servicios públicos y la inclusión digital, y, por tanto, el fortalecimiento de la gobernabilidad democrática y la competitividad.
                                <i class="fa fa-quote-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
</div>
