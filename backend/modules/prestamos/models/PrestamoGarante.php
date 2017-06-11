<?php

namespace backend\modules\prestamos\models;

use Yii;

/**
 * This is the model class for table "prestamo_garante".
 *
 * @property integer $id
 * @property integer $prestamo_id
 * @property integer $persona_id
 *
 * @property Persona $persona
 * @property Prestamo $prestamo
 */
class PrestamoGarante extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prestamo_garante';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prestamo_id', 'persona_id'], 'required'],
            [['prestamo_id', 'persona_id'], 'integer'],
            [['persona_id'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['persona_id' => 'id']],
            [['prestamo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Prestamo::className(), 'targetAttribute' => ['prestamo_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'prestamo_id' => Yii::t('app', 'Prestamo ID'),
            'persona_id' => Yii::t('app', 'Persona ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersona()
    {
        return $this->hasOne(Persona::className(), ['id' => 'persona_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrestamo()
    {
        return $this->hasOne(Prestamo::className(), ['id' => 'prestamo_id']);
    }
}
