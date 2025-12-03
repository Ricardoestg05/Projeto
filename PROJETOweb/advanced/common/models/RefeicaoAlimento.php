<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "refeicao_alimento".
 *
 * @property int $refeicao_id
 * @property int $alimento_id
 *
 * @property Alimento $alimento
 * @property Refeicao $refeicao
 */
class RefeicaoAlimento extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'refeicao_alimento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['refeicao_id', 'alimento_id'], 'required'],
            [['refeicao_id', 'alimento_id'], 'integer'],
            [['refeicao_id', 'alimento_id'], 'unique', 'targetAttribute' => ['refeicao_id', 'alimento_id']],
            [['alimento_id'], 'exist', 'skipOnError' => true, 'targetClass' => Alimento::class, 'targetAttribute' => ['alimento_id' => 'id']],
            [['refeicao_id'], 'exist', 'skipOnError' => true, 'targetClass' => Refeicao::class, 'targetAttribute' => ['refeicao_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'refeicao_id' => 'Refeicao ID',
            'alimento_id' => 'Alimento ID',
        ];
    }

    /**
     * Gets query for [[Alimento]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAlimento()
    {
        return $this->hasOne(Alimento::class, ['id' => 'alimento_id']);
    }

    /**
     * Gets query for [[Refeicao]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRefeicao()
    {
        return $this->hasOne(Refeicao::class, ['id' => 'refeicao_id']);
    }

}
