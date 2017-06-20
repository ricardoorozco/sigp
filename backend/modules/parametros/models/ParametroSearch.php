<?php

namespace backend\modules\parametros\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\parametros\models\Parametro;

/**
 * ParametroSearch represents the model behind the search form about `backend\modules\parametros\models\Parametro`.
 */
class ParametroSearch extends Parametro
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'modulo_id'], 'integer'],
            [['codigo', 'etiqueta', 'posibles_valores', 'valor', 'tipo_de_dato'], 'safe'],
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
        $query = Parametro::find();

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
            'modulo_id' => $this->modulo_id,
        ]);

        $query->andFilterWhere(['like', 'codigo', $this->codigo])
            ->andFilterWhere(['like', 'etiqueta', $this->etiqueta])
            ->andFilterWhere(['like', 'posibles_valores', $this->posibles_valores])
            ->andFilterWhere(['like', 'valor', $this->valor])
            ->andFilterWhere(['like', 'tipo_de_dato', $this->tipo_de_dato]);

        return $dataProvider;
    }
}
