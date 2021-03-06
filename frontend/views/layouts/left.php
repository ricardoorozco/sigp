<?php

use yii\bootstrap\Html;
?>
<div class="navbar nav_title" style="border: 0;">
    <a href="<?= Yii::$app->homeUrl ?>" class="site_title"><i><img style="width: 20px; height: 20px;" src="https://www.iconfinder.com/data/icons/animals-45/755/Lion-64.png" /></i><span> SIGP!</span></a>
</div>
<div class="clearfix"></div>

<!-- menu prile quick info -->
<div class="profile">
    <div class="profile_pic">
        <img src="<?= \yii\helpers\Url::base()?>/images/user.png" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
        <span>Welcome,</span>
        <h2>John Doe</h2>
    </div>
</div>
<!-- /menu prile quick info -->
<br />
<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <?=
        \yiister\gentelella\widgets\Menu::widget(
                [
                    "items" => [
                        ["label" => "Escritorio", "url" => Yii::$app->homeUrl, "icon" => "line-chart"],
                        ["label" => "Prestamos", "url" => \yii\helpers\Url::home() . "/prestamos/prestamo", "icon" => "usd"],
                        ["label" => "Clientes", "url" => \yii\helpers\Url::home() . "/clientes/cliente", "icon" => "users"],
                        ["label" => "Configuracion", "url" => \yii\helpers\Url::home() . "/parametros/parametro", "icon" => "gear"],
                        /*[
                            "label" => "Multilevel",
                            "url" => "#",
                            "icon" => "table",
                            "items" => [
                                [
                                    "label" => "Second level 1",
                                    "url" => "#",
                                ],
                                [
                                    "label" => "Second level 2",
                                    "url" => "#",
                                    "items" => [
                                        [
                                            "label" => "Third level 1",
                                            "url" => "#",
                                        ],
                                        [
                                            "label" => "Third level 2",
                                            "url" => "#",
                                        ],
                                    ],
                                ],
                            ],
                        ],*/
                    ],
                ]
        )
        ?>
    </div>
</div>
<!-- /sidebar menu -->

<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
    <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
    </a>
    <?=
    Html::a(
            '<span class="glyphicon glyphicon-off" aria-hidden="true"></span>', ['/site/logout'], ['data-method' => 'post', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Logout']
    )
    ?>
</div>
<!-- /menu footer buttons -->
