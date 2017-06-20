<?php

namespace backend\modules\prestamos\models;

use Yii;

/**
 * This is the model class for table "prestamo".
 *
 * @property integer $id
 * @property integer $cliente_id
 * @property double $valor
 * @property string $numero_cuotas
 * @property double $valor_cuota
 * @property double $interes_cuota
 * @property double $total_abonado
 * @property integer $cuota_actual
 * @property string $fecha_inicio
 * @property string $fecha_fin
 *
 * @property Persona $cliente
 * @property PrestamoGarante[] $prestamoGarantes
 */
class Prestamo extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'prestamo';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['cliente_id', 'valor', 'numero_cuotas', 'valor_cuota', 'interes_cuota'], 'required'],
            [['cliente_id', 'cuota_actual'], 'integer'],
            [['valor', 'valor_cuota', 'interes_cuota', 'total_abonado'], 'number'],
            [['fecha_inicio', 'fecha_fin'], 'safe'],
            [['numero_cuotas'], 'string', 'max' => 255],
            [['cliente_id'], 'exist', 'skipOnError' => true, 'targetClass' => \backend\modules\personas\models\Persona::className(), 'targetAttribute' => ['cliente_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'cliente_id' => Yii::t('app', 'Cliente ID'),
            'valor' => Yii::t('app', 'Valor'),
            'numero_cuotas' => Yii::t('app', 'Numero Cuotas'),
            'valor_cuota' => Yii::t('app', 'Valor Cuota'),
            'interes_cuota' => Yii::t('app', 'Interes Cuota'),
            'total_abonado' => Yii::t('app', 'Total Abonado'),
            'cuota_actual' => Yii::t('app', 'Cuota Actual'),
            'fecha_inicio' => Yii::t('app', 'Fecha Inicio'),
            'fecha_fin' => Yii::t('app', 'Fecha Fin'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente() {
        return $this->hasOne(\backend\modules\personas\models\Persona::className(), ['id' => 'cliente_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrestamoGarantes() {
        return $this->hasMany(PrestamoGarante::className(), ['prestamo_id' => 'id']);
    }

    public function getDiasMora() {
        $dias = 0;
        
        return $dias;
    }

    public static function totalPrestamos() {
        $total = 0;
        $pestamos = Prestamo::find()->all();
        foreach ($pestamos as $key => $prestamo) {
            $total += $prestamo->valor;
        }

        return $total;
    }

    public static function totalRecaudos() {
        $total = 0;
        $pestamos = Prestamo::find()->all();
        foreach ($pestamos as $key => $prestamo) {
            $total += $prestamo->total_abonado;
        }

        return $total;
    }

    public static function prestamoPromedio() {
        $total = 0;
        $pestamos = Prestamo::find()->all();
        foreach ($pestamos as $key => $prestamo) {
            $total += $prestamo->valor;
        }
        if (count($pestamos)) {
            $promedio = $total / count($pestamos);
        } else {
            $promedio = 0;
        }
        return $promedio;
    }

    public static function totalPrestamosMora() {
        $total = 0;
        $pestamos = Prestamo::find()->where(['<', 'fecha_fin', date("Y-m-d")])->all();
        foreach ($pestamos as $key => $prestamo) {
            $total += $prestamo->valor - $prestamo->total_abonado;
        }

        return $total;
    }

}
