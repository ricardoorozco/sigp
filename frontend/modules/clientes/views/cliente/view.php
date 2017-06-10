<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\clientes\models\Cliente */

$this->params['h1'] = 'Clientes';
$this->title = $this->params['h1'] . ' - ' . Yii::$app->name;
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Perfil del Cliente</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                    <div class="profile_img">
                        <div id="crop-avatar">
                            <!-- Current avatar -->
                            <img class="img-responsive avatar-view" src="../../../images/user.png" alt="Avatar" title="Change the avatar">
                        </div>
                    </div>
                    <h3><?= $model->fullName ?></h3>

                    <ul class="list-unstyled user_data">
                        <li>
                            <p class="ratings">
                                <?php $color = $model->calificacion < 3 ? 'red' : '' ?>
                                <a class="<?= $color ?>"><?= $model->calificacion ?>.0</a>
                                <?php
                                $estrellasBuenas = 5;
                                $estrellasCliente = $model->calificacion;
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
                        </li>
                        <li>
                            <i class="fa fa-map-marker user-profile-icon"></i> <?= $model->ubicacion ?>
                        </li>
                    </ul>
                    <?= Html::a('<i class="fa fa-edit m-right-xs"></i>Editar datos personales', ["update", "id" => $model->id], ["class" => "btn btn-success"]) ?>
                    <br />
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12">

                    <div class="profile_title">
                        <div class="col-md-6">
                            <h2>Actividad</h2>
                        </div>
                        <div class="col-md-6">
                            <div id="reportrange" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                            </div>
                        </div>
                    </div>
                    <!-- start of user-activity-graph -->
                    <div id="graph_bar" style="width:100%; height:280px;"></div>
                    <!-- end of user-activity-graph -->

                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Actividad Reciente</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Historico de Prestamos</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Datos Personales</a>
                            </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                                <!-- start recent activity -->
                                <ul class="messages">
                                    <li>
                                        <img src="../../../images/user.png" class="avatar" alt="Avatar">
                                        <div class="message_date">
                                            <h3 class="date text-info">05</h3>
                                            <p class="month">Jun</p>
                                        </div>
                                        <div class="message_wrapper">
                                            <h4 class="heading">Recaudador 1</h4>
                                            <blockquote class="message">No abono. El cliente manifiesta que mañana entrega las 2 cuotas .</blockquote>
                                            <br />
                                        </div>
                                    </li>
                                    <li>
                                        <img src="../../../images/user.png" class="avatar" alt="Avatar">
                                        <div class="message_date">
                                            <h3 class="date text-info">04</h3>
                                            <p class="month">Jun</p>
                                        </div>
                                        <div class="message_wrapper">
                                            <h4 class="heading">Recaudador 1</h4>
                                            <blockquote class="message">Recaudo de cartera por valor de $1.000.000 .</blockquote>
                                            <br />
                                        </div>
                                    </li>
                                    <li>
                                        <img src="../../../images/user.png" class="avatar" alt="Avatar">
                                        <div class="message_date">
                                            <h3 class="date text-info">03</h3>
                                            <p class="month">Jun</p>
                                        </div>
                                        <div class="message_wrapper">
                                            <h4 class="heading">Recaudador 1</h4>
                                            <blockquote class="message">Recaudo de cartera por valor de $1.000.000 .</blockquote>
                                            <br />
                                        </div>
                                    </li>
                                    <li>
                                        <img src="../../../images/user.png" class="avatar" alt="Avatar">
                                        <div class="message_date">
                                            <h3 class="date text-info">02</h3>
                                            <p class="month">Jun</p>
                                        </div>
                                        <div class="message_wrapper">
                                            <h4 class="heading">Recaudador 1</h4>
                                            <blockquote class="message">Recaudo de cartera por valor de $1.000.000 .</blockquote>
                                            <br />
                                        </div>
                                    </li>
                                    <li>
                                        <img src="../../../images/user.png" class="avatar" alt="Avatar">
                                        <div class="message_date">
                                            <h3 class="date text-info">01</h3>
                                            <p class="month">Junio</p>
                                        </div>
                                        <div class="message_wrapper">
                                            <h4 class="heading">Recaudador 1</h4>
                                            <blockquote class="message">Prestamo de $5.000.000 .</blockquote>
                                            <br />
                                        </div>
                                    </li>
                                </ul>
                                <!-- end recent activity -->

                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                                <!-- start user projects -->
                                <table class="data table table-striped no-margin">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Project Name</th>
                                            <th>Client Company</th>
                                            <th class="hidden-phone">Hours Spent</th>
                                            <th>Contribution</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>New Company Takeover Review</td>
                                            <td>Deveint Inc</td>
                                            <td class="hidden-phone">18</td>
                                            <td class="vertical-align-mid">
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-success" data-transitiongoal="35"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>New Partner Contracts Consultanci</td>
                                            <td>Deveint Inc</td>
                                            <td class="hidden-phone">13</td>
                                            <td class="vertical-align-mid">
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-danger" data-transitiongoal="15"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Partners and Inverstors report</td>
                                            <td>Deveint Inc</td>
                                            <td class="hidden-phone">30</td>
                                            <td class="vertical-align-mid">
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-success" data-transitiongoal="45"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>New Company Takeover Review</td>
                                            <td>Deveint Inc</td>
                                            <td class="hidden-phone">28</td>
                                            <td class="vertical-align-mid">
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-success" data-transitiongoal="75"></div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- end user projects -->

                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui
                                    photo booth letterpress, commodo enim craft beer mlkshk </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$this->registerJsFile("@web/js/vendors/jquery/dist/jquery.min.js", [$this::POS_READY]);
$this->registerJsFile("@web/js/vendors/raphael/raphael.min.js", [$this::POS_READY]);
$this->registerJsFile("@web/js/vendors/morris.js/morris.min.js", [$this::POS_READY]);
