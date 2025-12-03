<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Planoexercicio;

/**
 * PlanoexercicioSearch represents the model behind the search form of `common\models\Planoexercicio`.
 */
class PlanoexercicioSearch extends Planoexercicio
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'plano_id', 'exercicio_id', 'series', 'repeticoes', 'tempodescanso'], 'integer'],
            [['observacoes'], 'safe'],
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
        $query = Planoexercicio::find();

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
            'plano_id' => $this->plano_id,
            'exercicio_id' => $this->exercicio_id,
            'series' => $this->series,
            'repeticoes' => $this->repeticoes,
            'tempodescanso' => $this->tempodescanso,
        ]);

        $query->andFilterWhere(['like', 'observacoes', $this->observacoes]);

        return $dataProvider;
    }
}
