<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Aulagrupo;

/**
 * AulagrupoSearch represents the model behind the search form of `common\models\Aulagrupo`.
 */
class AulagrupoSearch extends Aulagrupo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'treinador_id'], 'integer'],
            [['nomeaula', 'horario', 'capacidademaxima'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
     * @param string|null $formName Form name to be used into `->load()` method.
     *
     * @return ActiveDataProvider
     */
    public function search($params, $formName = null)
    {
        $query = Aulagrupo::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'horario' => $this->horario,
            'treinador_id' => $this->treinador_id,
        ]);

        $query->andFilterWhere(['like', 'nomeaula', $this->nomeaula])
            ->andFilterWhere(['like', 'capacidademaxima', $this->capacidademaxima]);

        return $dataProvider;
    }
}
