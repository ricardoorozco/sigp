<?php
/* @var $this yii\web\View */
$this->params['h1'] = 'Escritorio';
$this->title = $this->params['h1'] . ' - ' . Yii::$app->name;
?>
<!-- top tiles -->
<div class="row tile_count">
    <div class="col-md-3 col-sm-4 col-xs-12 tile_stats_count">
        <span class="count_top"><i class="fa fa-usd"></i> Total Base</span>
        <div class="count"><?= number_format($base, 0, ',', '.') ?></div>
        <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> Esta Semana</span>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-12 tile_stats_count">
        <span class="count_top"><i class="fa fa-usd"></i> Total Prestado</span>
        <div class="count"><?= number_format($totalPrestado, 0, ',', '.') ?></div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> Esta Semana</span>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-12 tile_stats_count">
        <span class="count_top"><i class="fa fa-usd"></i> Total Recaudado</span>
        <div class="count"><?= number_format($totalRecaudado, 0, ',', '.') ?></div>
        <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> Esta Semana</span>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-12 tile_stats_count">
        <span class="count_top"><i class="fa fa-usd"></i> Gastos Varios</span>
        <div class="count"><?= number_format($totalGastos, 0, ',', '.') ?></div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> Esta Semana</span>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-12 tile_stats_count">
        <span class="count_top"><i class="fa fa-usd"></i> Prestamo Promedio</span>
        <div class="count"><?= number_format($prestamoPromedio, 0, ',', '.') ?></div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> Esta Semana</span>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-12 tile_stats_count">
        <span class="count_top"><i class="fa fa-usd"></i> Total Interes Recaudado</span>
        <div class="count blue"><?= number_format($totalInteresRecaudado, 0, ',', '.') ?></div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> Esta Semana</span>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-12 tile_stats_count">
        <span class="count_top"><i class="fa fa-usd"></i> Total En Mora</span>
        <div class="count red"><?= number_format($totalMora, 0, ',', '.') ?></div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> Esta Semana</span>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-12 tile_stats_count">
        <span class="count_top"><i class="fa fa-usd"></i> Total En Caja</span>
        <div class="count green"><?= number_format($totalCaja, 0, ',', '.') ?></div>
        <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> Esta Semana</span>
    </div>
</div>
<!-- /top tiles -->
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_content">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                        <ul class="pagination pagination-split">
                            <!--
                            <li><a href="#">A</a></li>
                            <li><a href="#">B</a></li>
                            <li><a href="#">C</a></li>
                            <li><a href="#">D</a></li>
                            <li><a href="#">E</a></li>
                            <li>...</li>
                            <li><a href="#">W</a></li>
                            <li><a href="#">X</a></li>
                            <li><a href="#">Y</a></li>
                            <li><a href="#">Z</a></li>
                            -->
                            <?= count($prestamos) ?> Prestamo(s)
                        </ul>
                    </div>

                    <div class="clearfix"></div>

                    <?php
                    foreach ($prestamos as $key => $prestamo) {

                        $datetime1 = new DateTime(date("Y-m-d"));
                        $datetime2 = new DateTime($prestamo->fecha_fin);
                        $interval = $datetime1->diff($datetime2);
                        $diasRestantes = (int) $interval->format('%R%a');
                        ?>
                        <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                            <div class="well profile_view  ui-ribbon-container">
                                <?php if ($diasRestantes < 0) { ?>
                                    <div class="ui-ribbon-wrapper">
                                        <div class="ui-ribbon">
                                            EN MORA
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="col-sm-12">
                                    <h2 class="brief">
                                        <i>Fecha Limite: <?= (new DateTime($prestamo->fecha_fin))->format('d M Y') ?></i>
                                        <br />
                                        <?php if ($diasRestantes < 0) { ?>
                                            <strong class="red"><?= $diasRestantes ?> Días de atraso</strong>
                                        <?php } elseif ($diasRestantes === 0) { ?>
                                            <strong class="red">VENCE HOY</strong>
                                        <?php } else { ?>
                                            <strong class="blue"><?= $diasRestantes ?> Días restantes</strong>
                                        <?php } ?>
                                    </h2>
                                    <div class="left col-xs-7">
                                        <h2><?= \yii\helpers\Html::a($prestamo->cliente->fullName, Yii::$app->urlManager->createAbsoluteUrl(["clientes/cliente/view", "id" => $prestamo->cliente->id])) ?></h2>
                                        <ul class="list-unstyled">
                                            <li>
                                                <i class="fa fa-money"></i> <strong>Prestamo:</strong><br />
                                                <h2><?= number_format($prestamo->valor, 2, ',', '.') ?></h2>
                                            </li>
                                            <li>
                                                <i class="fa fa-line-chart"></i> <strong>Ganancia Esperada:</strong><br />
                                                <h2><?= number_format((($prestamo->valor_cuota * $prestamo->numero_cuotas) - $prestamo->valor), 2, ',', '.') ?></h2>
                                            </li>
                                            <li>
                                                <i class="fa fa-briefcase"></i> <strong>Recaudado:</strong><br />
                                                <h2><?= number_format($prestamo->total_abonado, 2, ',', '.') ?></h2>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="right col-xs-5 text-center">
                                        <img src="images/user.png" alt="" class="img-circle img-responsive">
                                    </div>
                                </div>
                                <div class="col-xs-12 bottom text-center">
                                    <div class="col-xs-12 col-sm-6 emphasis">
                                        <p class="ratings">
                                            <?php $color = $prestamo->cliente->calificacion < 3 ? 'red' : '' ?>
                                            <a class="<?= $color ?>"><?= $prestamo->cliente->calificacion ?>.0</a>
                                            <?php
                                            $estrellasBuenas = 5;
                                            $estrellasCliente = $prestamo->cliente->calificacion;
                                            for ($i = 5; $i > 0; $i--) {
                                                if ($estrellasCliente > 0) {
                                                    echo '<a href="#"><span class="fa fa-star ' . $color . '"></span></a>';
                                                    $estrellasCliente--;
                                                } else {
                                                    echo '<a href="#"><span class="fa fa-star-o ' . $color . '"></span></a>';
                                                }
                                            }
                                            ?>
                                        </p>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 emphasis">
                                        <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
                                            </i> <i class="fa fa-comments-o"></i> </button>
                                        <button type="button" class="btn btn-primary btn-xs">
                                            <i class="fa fa-user"> </i> View Profile
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>