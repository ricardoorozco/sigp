<?php
/* @var $this yii\web\View */
$this->params['h1'] = 'Escritorio';
$this->title = $this->params['h1'] . ' - ' . Yii::$app->name;
?>
<!-- top tiles -->
<div class="row tile_count">
    <div class="col-md-3 col-sm-4 col-xs-12 tile_stats_count">
        <span class="count_top"><i class="fa fa-usd"></i> Total Base</span>
        <div class="count">800.000.000</div>
        <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> Esta Semana</span>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-12 tile_stats_count">
        <span class="count_top"><i class="fa fa-usd"></i> Total Prestado</span>
        <div class="count">670.000.000</div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> Esta Semana</span>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-12 tile_stats_count">
        <span class="count_top"><i class="fa fa-usd"></i> Total Recaudado</span>
        <div class="count">178.654.000</div>
        <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> Esta Semana</span>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-12 tile_stats_count">
        <span class="count_top"><i class="fa fa-usd"></i> Gastos Varios</span>
        <div class="count">7.000.000</div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> Esta Semana</span>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-12 tile_stats_count">
        <span class="count_top"><i class="fa fa-usd"></i> Prestamo Promedio</span>
        <div class="count">12.500.000</div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> Esta Semana</span>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-12 tile_stats_count">
        <span class="count_top"><i class="fa fa-usd"></i> Total Interes Recaudado</span>
        <div class="count blue">25.000.000</div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> Esta Semana</span>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-12 tile_stats_count">
        <span class="count_top"><i class="fa fa-usd"></i> Total En Mora</span>
        <div class="count red">171.000.000</div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> Esta Semana</span>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-12 tile_stats_count">
        <span class="count_top"><i class="fa fa-usd"></i> Total En Caja</span>
        <div class="count green">301.654.000</div>
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
                        </ul>
                    </div>

                    <div class="clearfix"></div>

                    <?php
                    foreach ($clientes as $key => $cliente) {
                        ?>
                        <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                            <div class="well profile_view  ui-ribbon-container">
                                <div class="ui-ribbon-wrapper">
                                    <div class="ui-ribbon">
                                        EN MORA
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <h2 class="brief">
                                        <i>Fecha Limite: <?= (new DateTime('2017-07-28'))->format('d M Y') ?></i>
                                        <br />
                                        <strong class="red">7 Días de atraso</strong>
                                    </h2>
                                    <div class="left col-xs-7">
                                        <h2><?= \yii\helpers\Html::a($cliente->fullName, Yii::$app->urlManager->createAbsoluteUrl(["clientes/cliente/view", "id" => $cliente->id])) ?></h2>
                                        <ul class="list-unstyled">
                                            <li>
                                                <i class="fa fa-money"></i> <strong>Prestamo:</strong><br />
                                                <h2>15.000.000</h2>
                                            </li>
                                            <li>
                                                <i class="fa fa-line-chart"></i> <strong>Ganancia Esperada:</strong><br />
                                                <h2>2.000.000</h2>
                                            </li>
                                            <li>
                                                <i class="fa fa-briefcase"></i> <strong>Recaudado:</strong><br />
                                                <h2>1.000.000</h2>
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
                                            <?php $color = $cliente->calificacion < 3 ? 'red' : '' ?>
                                            <a class="<?= $color ?>"><?= $cliente->calificacion ?>.0</a>
                                            <?php
                                            $estrellasBuenas = 5;
                                            $estrellasCliente = $cliente->calificacion;
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

                    <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                        <div class="well profile_view">
                            <div class="col-sm-12">
                                <h2 class="brief">
                                    <i>Fecha Limite: <?= (new DateTime('2017-07-28'))->format('d M Y') ?></i>
                                    <br />
                                    <strong class="green">Quedan 50 Días</strong>
                                </h2>
                                <div class="left col-xs-7">
                                    <h2><?= \yii\helpers\Html::a('Jesus Leandro Salamanca', Yii::$app->urlManager->createAbsoluteUrl(["clientes/cliente/view", "id" => "1"])) ?></h2>
                                    <ul class="list-unstyled">
                                        <li>
                                            <i class="fa fa-money"></i> <strong>Prestamo:</strong><br />
                                            <h2>5.000.000</h2>
                                        </li>
                                        <li>
                                            <i class="fa fa-line-chart"></i> <strong>Ganancia Esperada:</strong><br />
                                            <h2>2.000.000</h2>
                                        </li>
                                        <li>
                                            <i class="fa fa-briefcase"></i> <strong>Recaudado:</strong><br />
                                            <h2>1.000.000</h2>
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
                                        <a>4.0</a>
                                        <a href="#"><span class="fa fa-star"></span></a>
                                        <a href="#"><span class="fa fa-star"></span></a>
                                        <a href="#"><span class="fa fa-star"></span></a>
                                        <a href="#"><span class="fa fa-star"></span></a>
                                        <a href="#"><span class="fa fa-star-o"></span></a>
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

                    <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                        <div class="well profile_view">
                            <div class="col-sm-12">
                                <h2 class="brief">
                                    <i>Fecha Limite: <?= (new DateTime('2017-07-28'))->format('d M Y') ?></i>
                                    <br />
                                    <strong class="green">Quedan 50 Días</strong>
                                </h2>
                                <div class="left col-xs-7">
                                    <h2><?= \yii\helpers\Html::a('Jesus Leandro Salamanca', Yii::$app->urlManager->createAbsoluteUrl(["clientes/cliente/view", "id" => "1"])) ?></h2>
                                    <ul class="list-unstyled">
                                        <li>
                                            <i class="fa fa-money"></i> <strong>Prestamo:</strong><br />
                                            <h2>5.000.000</h2>
                                        </li>
                                        <li>
                                            <i class="fa fa-line-chart"></i> <strong>Ganancia Esperada:</strong><br />
                                            <h2>2.000.000</h2>
                                        </li>
                                        <li>
                                            <i class="fa fa-briefcase"></i> <strong>Recaudado:</strong><br />
                                            <h2>1.000.000</h2>
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
                                        <a>4.0</a>
                                        <a href="#"><span class="fa fa-star"></span></a>
                                        <a href="#"><span class="fa fa-star"></span></a>
                                        <a href="#"><span class="fa fa-star"></span></a>
                                        <a href="#"><span class="fa fa-star"></span></a>
                                        <a href="#"><span class="fa fa-star-o"></span></a>
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

                    <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                        <div class="well profile_view">
                            <div class="col-sm-12">
                                <h2 class="brief">
                                    <i>Fecha Limite: <?= (new DateTime('2017-07-28'))->format('d M Y') ?></i>
                                    <br />
                                    <strong class="green">Quedan 50 Días</strong>
                                </h2>
                                <div class="left col-xs-7">
                                    <h2><?= \yii\helpers\Html::a('Jesus Leandro Salamanca', Yii::$app->urlManager->createAbsoluteUrl(["clientes/cliente/view", "id" => "1"])) ?></h2>
                                    <ul class="list-unstyled">
                                        <li>
                                            <i class="fa fa-money"></i> <strong>Prestamo:</strong><br />
                                            <h2>5.000.000</h2>
                                        </li>
                                        <li>
                                            <i class="fa fa-line-chart"></i> <strong>Ganancia Esperada:</strong><br />
                                            <h2>2.000.000</h2>
                                        </li>
                                        <li>
                                            <i class="fa fa-briefcase"></i> <strong>Recaudado:</strong><br />
                                            <h2>1.000.000</h2>
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
                                        <a>4.0</a>
                                        <a href="#"><span class="fa fa-star"></span></a>
                                        <a href="#"><span class="fa fa-star"></span></a>
                                        <a href="#"><span class="fa fa-star"></span></a>
                                        <a href="#"><span class="fa fa-star"></span></a>
                                        <a href="#"><span class="fa fa-star-o"></span></a>
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

                    <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                        <div class="well profile_view">
                            <div class="col-sm-12">
                                <h2 class="brief">
                                    <i>Fecha Limite: <?= (new DateTime('2017-07-28'))->format('d M Y') ?></i>
                                    <br />
                                    <strong class="green">Quedan 50 Días</strong>
                                </h2>
                                <div class="left col-xs-7">
                                    <h2><?= \yii\helpers\Html::a('Jesus Leandro Salamanca', Yii::$app->urlManager->createAbsoluteUrl(["clientes/cliente/view", "id" => "1"])) ?></h2>
                                    <ul class="list-unstyled">
                                        <li>
                                            <i class="fa fa-money"></i> <strong>Prestamo:</strong><br />
                                            <h2>5.000.000</h2>
                                        </li>
                                        <li>
                                            <i class="fa fa-line-chart"></i> <strong>Ganancia Esperada:</strong><br />
                                            <h2>2.000.000</h2>
                                        </li>
                                        <li>
                                            <i class="fa fa-briefcase"></i> <strong>Recaudado:</strong><br />
                                            <h2>1.000.000</h2>
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
                                        <a>4.0</a>
                                        <a href="#"><span class="fa fa-star"></span></a>
                                        <a href="#"><span class="fa fa-star"></span></a>
                                        <a href="#"><span class="fa fa-star"></span></a>
                                        <a href="#"><span class="fa fa-star"></span></a>
                                        <a href="#"><span class="fa fa-star-o"></span></a>
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

                    <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                        <div class="well profile_view">
                            <div class="col-sm-12">
                                <h2 class="brief">
                                    <i>Fecha Limite: <?= (new DateTime('2017-07-28'))->format('d M Y') ?></i>
                                    <br />
                                    <strong class="green">Quedan 50 Días</strong>
                                </h2>
                                <div class="left col-xs-7">
                                    <h2><?= \yii\helpers\Html::a('Jesus Leandro Salamanca', Yii::$app->urlManager->createAbsoluteUrl(["clientes/cliente/view", "id" => "1"])) ?></h2>
                                    <ul class="list-unstyled">
                                        <li>
                                            <i class="fa fa-money"></i> <strong>Prestamo:</strong><br />
                                            <h2>5.000.000</h2>
                                        </li>
                                        <li>
                                            <i class="fa fa-line-chart"></i> <strong>Ganancia Esperada:</strong><br />
                                            <h2>2.000.000</h2>
                                        </li>
                                        <li>
                                            <i class="fa fa-briefcase"></i> <strong>Recaudado:</strong><br />
                                            <h2>1.000.000</h2>
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
                                        <a>4.0</a>
                                        <a href="#"><span class="fa fa-star"></span></a>
                                        <a href="#"><span class="fa fa-star"></span></a>
                                        <a href="#"><span class="fa fa-star"></span></a>
                                        <a href="#"><span class="fa fa-star"></span></a>
                                        <a href="#"><span class="fa fa-star-o"></span></a>
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

                </div>
            </div>
        </div>
    </div>
</div>
<?php
$this->registerJsFile("@web/js/vendors/fastclick/lib/fastclick.js", [$this::POS_END]);
$this->registerJsFile("@web/js/vendors/nprogress/nprogress.js", [$this::POS_END]);
