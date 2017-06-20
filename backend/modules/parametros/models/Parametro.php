<?php

namespace backend\modules\parametros\models;

use Yii;

/**
 * This is the model class for table "parametro".
 *
 * @property integer $id
 * @property integer $modulo_id
 * @property string $codigo
 * @property string $etiqueta
 * @property string $posibles_valores
 * @property string $valor
 * @property string $tipo_de_dato
 *
 * @property Modulo $modulo
 */
class Parametro extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'parametro';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['modulo_id', 'codigo', 'etiqueta'], 'required'],
            [['modulo_id'], 'integer'],
            [['codigo', 'etiqueta', 'posibles_valores', 'valor', 'tipo_de_dato'], 'string', 'max' => 255],
            [['codigo'], 'unique'],
            [['modulo_id'], 'exist', 'skipOnError' => true, 'targetClass' => \backend\modules\modulos\models\Modulo::className(), 'targetAttribute' => ['modulo_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'modulo_id' => Yii::t('app', 'Modulo ID'),
            'codigo' => Yii::t('app', 'Codigo'),
            'etiqueta' => Yii::t('app', 'Etiqueta'),
            'posibles_valores' => Yii::t('app', 'Posibles Valores'),
            'valor' => Yii::t('app', 'Valor'),
            'tipo_de_dato' => Yii::t('app', 'Tipo De Dato'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModulo()
    {
        return $this->hasOne(Modulo::className(), ['id' => 'modulo_id']);
    }
}
