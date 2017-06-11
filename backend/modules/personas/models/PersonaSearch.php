<?php

namespace backend\modules\personas\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\personas\models\Persona;

/**
 * PersonaSearch represents the model behind the search form about `backend\modules\personas\models\Persona`.
 */
class PersonaSearch extends Persona
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'calificacion', 'sw_empleado'], 'integer'],
            [['documento_numero', 'primer_nombre', 'segundo_nombre', 'primer_apellido', 'segundo_apellido', 'telefono_principal', 'telefonos', 'direccion_principal', 'direcciones', 'ubicacion'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Persona::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'calificacion' => $this->calificacion,
            'sw_empleado' => $this->sw_empleado,
        ]);

        $query->andFilterWhere(['like', 'documento_numero', $this->documento_numero])
            ->andFilterWhere(['like', 'primer_nombre', $this->primer_nombre])
            ->andFilterWhere(['like', 'segundo_nombre', $this->segundo_nombre])
            ->andFilterWhere(['like', 'primer_apellido', $this->primer_apellido])
            ->andFilterWhere(['like', 'segundo_apellido', $this->segundo_apellido])
            ->andFilterWhere(['like', 'telefono_principal', $this->telefono_principal])
            ->andFilterWhere(['like', 'telefonos', $this->telefonos])
            ->andFilterWhere(['like', 'direccion_principal', $this->direccion_principal])
            ->andFilterWhere(['like', 'direcciones', $this->direcciones])
            ->andFilterWhere(['like', 'ubicacion', $this->ubicacion]);

        return $dataProvider;
    }
}
