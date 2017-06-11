<?php

namespace backend\modules\personas\models;

use Yii;

/**
 * This is the model class for table "persona".
 *
 * @property integer $id
 * @property string $documento_numero
 * @property string $primer_nombre
 * @property string $segundo_nombre
 * @property string $primer_apellido
 * @property string $segundo_apellido
 * @property string $telefono_principal
 * @property string $telefonos
 * @property string $direccion_principal
 * @property string $direcciones
 * @property string $ubicacion
 * @property integer $calificacion
 * @property integer $sw_empleado
 *
 * @property Prestamo[] $prestamos
 * @property PrestamoGarante[] $prestamoGarantes
 */
class Persona extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'persona';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['documento_numero', 'primer_nombre', 'primer_apellido', 'telefono_principal', 'direccion_principal', 'ubicacion'], 'required'],
            [['calificacion', 'sw_empleado'], 'integer'],
            [['documento_numero', 'primer_nombre', 'segundo_nombre', 'primer_apellido', 'segundo_apellido', 'telefono_principal', 'telefonos', 'direccion_principal', 'direcciones', 'ubicacion'], 'string', 'max' => 255],
            [['documento_numero'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'documento_numero' => Yii::t('app', 'Documento Numero'),
            'primer_nombre' => Yii::t('app', 'Primer Nombre'),
            'segundo_nombre' => Yii::t('app', 'Segundo Nombre'),
            'primer_apellido' => Yii::t('app', 'Primer Apellido'),
            'segundo_apellido' => Yii::t('app', 'Segundo Apellido'),
            'telefono_principal' => Yii::t('app', 'Telefono Principal'),
            'telefonos' => Yii::t('app', 'Telefonos'),
            'direccion_principal' => Yii::t('app', 'Direccion Principal'),
            'direcciones' => Yii::t('app', 'Direcciones'),
            'ubicacion' => Yii::t('app', 'Ubicacion'),
            'calificacion' => Yii::t('app', 'Calificacion'),
            'sw_empleado' => Yii::t('app', 'Sw Empleado'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrestamos() {
        return $this->hasMany(\backend\modules\prestamos\models\Prestamo::className(), ['cliente_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrestamoGarantes() {
        return $this->hasMany(\backend\modules\prestamos\models\PrestamoGarante::className(), ['persona_id' => 'id']);
    }

    public function getFullName() {
        $fullName = $this->primer_nombre;
        $fullName .= isset($this->segundo_nombre) ? ' ' . $this->segundo_nombre : null;
        $fullName .= ' ' . $this->primer_apellido;
        $fullName .= isset($this->segundo_apellido) ? ' ' . $this->segundo_apellido : null;

        return $fullName;
    }

}
