<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "planoexercicio".
 *
 * @property int $id
 * @property int $plano_id
 * @property int $exercicio_id
 * @property int $series
 * @property int $repeticoes
 * @property int $tempodescanso
 * @property string $observacoes
 *
 * @property Exercicio $exercicio
 * @property Planotreino $plano
 */
class Planoexercicio extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'planoexercicio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['plano_id', 'exercicio_id', 'series', 'repeticoes', 'tempodescanso', 'observacoes'], 'required'],
            [['plano_id', 'exercicio_id', 'series', 'repeticoes', 'tempodescanso'], 'integer'],
            [['observacoes'], 'string', 'max' => 255],
            [['plano_id'], 'exist', 'skipOnError' => true, 'targetClass' => Planotreino::class, 'targetAttribute' => ['plano_id' => 'id']],
            [['exercicio_id'], 'exist', 'skipOnError' => true, 'targetClass' => Exercicio::class, 'targetAttribute' => ['exercicio_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'plano_id' => 'Plano ID',
            'exercicio_id' => 'Exercicio ID',
            'series' => 'Series',
            'repeticoes' => 'Repeticoes',
            'tempodescanso' => 'Tempodescanso',
            'observacoes' => 'Observacoes',
        ];
    }

    /**
     * Gets query for [[Exercicio]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExercicio()
    {
        return $this->hasOne(Exercicio::class, ['id' => 'exercicio_id']);
    }

    /**
     * Gets query for [[Plano]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlano()
    {
        return $this->hasOne(Planotreino::class, ['id' => 'plano_id']);
    }

}
