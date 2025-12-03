<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Avaliacaofisica;

/**
 * AvaliacaofisicaSearch represents the model behind the search form of `common\models\Avaliacaofisica`.
 */
class AvaliacaofisicaSearch extends Avaliacaofisica
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cliente_id', 'treinador_id'], 'integer'],
            [['datavaliacao', 'altura', 'imc', 'observacoes'], 'safe'],
            [['peso'], 'number'],
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
        $query = Avaliacaofisica::find();

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
            'cliente_id' => $this->cliente_id,
            'treinador_id' => $this->treinador_id,
            'datavaliacao' => $this->datavaliacao,
            'peso' => $this->peso,
        ]);

        $query->andFilterWhere(['like', 'altura', $this->altura])
            ->andFilterWhere(['like', 'imc', $this->imc])
            ->andFilterWhere(['like', 'observacoes', $this->observacoes]);

        return $dataProvider;
    }
}
