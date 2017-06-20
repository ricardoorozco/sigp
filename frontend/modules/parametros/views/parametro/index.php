<?php
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/bower/Notifications');
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Parámetros Generales del Sistema</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <?php
            $i = 0;
            if (isset($parametros)) {
                foreach ($parametros as $key => $parametro) {
                    if ($parametro->presentacion == 'select' && isset($parametro->posibles_valores) && $parametro->posibles_valores != '') {
                        ?>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <?= $parametro->etiqueta ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <?= \yii\helpers\Html::dropDownList($parametro->codigo, $parametro->valor, yii\helpers\Json::decode($parametro->posibles_valores), ['prompt' => 'Seleccionar...', 'class' => 'form-control input-sm', 'onchange' => 'actualizarValor(this,' . $parametro->id . ');']) ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    } elseif ($parametro->presentacion == 'checkbox' && isset($parametro->posibles_valores) && $parametro->posibles_valores != '') {
                        ?>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <?= $parametro->etiqueta ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php
                                    $values = yii\helpers\Json::decode($parametro->posibles_valores);
                                    echo \kartik\switchinput\SwitchInput::widget([
                                        'id' => $parametro->codigo,
                                        'name' => $parametro->codigo,
                                        'value' => $parametro->valor,
                                        'pluginOptions' => [
                                            'labelText' => '<i class="fa fa-exchange"></i>',
                                            'onText' => $values[1],
                                            'offText' => $values[0],
                                        //'size' => 'mini'
                                        ],
                                        'options' => [
                                            'onchange' => 'actualizarValorCheck(this,' . $parametro->id . ')'
                                        ]
                                    ]);
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    } elseif ($parametro->presentacion == 'text') {
                        ?>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <?= $parametro->etiqueta ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <?= \yii\helpers\Html::input('text', $parametro->codigo, $parametro->valor, ['class' => 'form-control input-sm', 'onchange' => 'actualizarValor(this,' . $parametro->id . ');']); ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    if (($i++) % 2 == 0) {
                        echo "<div class='col-md-12'>&nbsp;</div>";
                    }
                }
            }
            ?>
        </div>
        <?php
        $script = "function actualizarValor(obj, idParametro){"
                . " var url='" . Yii::$app->urlManager->createUrl('parametros/parametro/update') . "';"
                . " var data={"
                . "    'idParametro':idParametro,"
                . "    'valor':obj.value,"
                . " };"
                . " $.post(url,data,function(res){"
                . " },'json');"
                . "new PNotify({
                                  title: 'Regular Success',
                                  text: 'That thing that you were trying to do worked!',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });"
                . "}";
        $this->registerJs($script, $this::POS_HEAD);
        $script = "function actualizarValorCheck(obj, idParametro){"
                . " var url='" . Yii::$app->urlManager->createUrl('parametros/parametro/update') . "';"
                . " var data={"
                . "    'idParametro':idParametro,"
                . "    'valor':(obj.checked)?'1':'0',"
                . " };"
                . " $.post(url,data,function(res){"
                . " },'json');"
                . "new PNotify({
                                  title: 'Regular Success',
                                  text: 'That thing that you were trying to do worked!',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });"
                . "}";
        $this->registerJs($script, $this::POS_HEAD);
        ?>
    </div>
</div>

<?php
$this->registerJsFile("@web/js/vendors/jquery/dist/jquery.min.js", [$this::POS_READY]);
$this->registerJsFile("@web/js/vendors/pnotify/dist/pnotify.js", [$this::POS_READY]);
$this->registerJsFile("@web/js/vendors/pnotify/dist/pnotify.buttons.js", [$this::POS_READY]);
$this->registerJsFile("@web/js/vendors/pnotify/dist/pnotify.nonblock.js", [$this::POS_READY]);