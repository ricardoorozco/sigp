<?php

namespace frontend\modules\parametros\controllers;

use Yii;
use backend\modules\parametros\models\Parametro;
use backend\modules\parametros\models\ParametroSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ParametroController implements the CRUD actions for Parametro model.
 */
class ParametroController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Parametro models.
     * @return mixed
     */
    public function actionIndex() {
        $parametros = Parametro::find()->where(["modulo_id" => "1"])/* ->orderBy("orden") */->all();

        return $this->render('index', [
                    'parametros' => $parametros,
        ]);
    }

    /**
     * Displays a single Parametro model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Parametro model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Parametro();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Parametro model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate() {
        $idParametro = Yii::$app->request->post('idParametro');
        $valor = Yii::$app->request->post('valor');
        $parametro = Parametro::find()->where(['id' => $idParametro])->one();
        if (!empty($parametro)) {
            if ($parametro->tipo_de_dato == 'double') {
                $filter = FILTER_VALIDATE_FLOAT;
            } elseif ($parametro->tipo_de_dato == 'integer') {
                $filter = FILTER_VALIDATE_INT;
            } else {
                $filter = null;
            }

            if ($filter === null || filter_var($valor, $filter) || ($filter === FILTER_VALIDATE_INT && $valor === '0') || ($filter === FILTER_VALIDATE_FLOAT && $valor === '0')) {
                $parametro->valor = $valor;
                $parametro->save();
            } else {
                echo "EL DATO $valor NO CUMPLE CON EL TIPO DE DATO $filter";
            }
        }
    }

    /**
     * Deletes an existing Parametro model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Parametro model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Parametro the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Parametro::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
