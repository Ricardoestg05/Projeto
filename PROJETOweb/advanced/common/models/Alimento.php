<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "alimento".
 *
 * @property int $id
 * @property string $nome
 * @property string $tipo
 *
 * @property RefeicaoAlimento[] $refeicaoAlimentos
 * @property Refeicao[] $refeicaos
 */
class Alimento extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'alimento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'tipo'], 'required'],
            [['nome', 'tipo'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'tipo' => 'Tipo',
        ];
    }

    /**
     * Gets query for [[RefeicaoAlimentos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRefeicaoAlimentos()
    {
        return $this->hasMany(RefeicaoAlimento::class, ['alimento_id' => 'id']);
    }

    /**
     * Gets query for [[Refeicaos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRefeicaos()
    {
        return $this->hasMany(Refeicao::class, ['id' => 'refeicao_id'])->viaTable('refeicao_alimento', ['alimento_id' => 'id']);
    }

}
