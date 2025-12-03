<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Refeicaoalimento;

/**
 * RefeicaoalimentoSearch represents the model behind the search form of `common\models\Refeicaoalimento`.
 */
class RefeicaoalimentoSearch extends Refeicaoalimento
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['refeicao_id', 'alimento_id'], 'integer'],
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
        $query = Refeicaoalimento::find();

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
            'refeicao_id' => $this->refeicao_id,
            'alimento_id' => $this->alimento_id,
        ]);

        return $dataProvider;
    }
}
