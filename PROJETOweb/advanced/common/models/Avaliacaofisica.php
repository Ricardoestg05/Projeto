<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "avaliacaofisica".
 *
 * @property int $id
 * @property int $cliente_id
 * @property int $treinador_id
 * @property string $datavaliacao
 * @property float $peso
 * @property string $altura
 * @property string $imc
 * @property string $observacoes
 *
 * @property Profile $cliente
 * @property Profile $treinador
 */
class Avaliacaofisica extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'avaliacaofisica';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cliente_id', 'treinador_id', 'datavaliacao', 'peso', 'altura', 'imc', 'observacoes'], 'required'],
            [['cliente_id', 'treinador_id'], 'integer'],
            [['datavaliacao'], 'safe'],
            [['peso'], 'number'],
            [['altura', 'imc'], 'string', 'max' => 3],
            [['observacoes'], 'string', 'max' => 250],
            [['cliente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::class, 'targetAttribute' => ['cliente_id' => 'id']],
            [['treinador_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::class, 'targetAttribute' => ['treinador_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cliente_id' => 'Cliente ID',
            'treinador_id' => 'Treinador ID',
            'datavaliacao' => 'Datavaliacao',
            'peso' => 'Peso',
            'altura' => 'Altura',
            'imc' => 'Imc',
            'observacoes' => 'Observacoes',
        ];
    }

    /**
     * Gets query for [[Cliente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Profile::class, ['id' => 'cliente_id']);
    }

    /**
     * Gets query for [[Treinador]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTreinador()
    {
        return $this->hasOne(Profile::class, ['id' => 'treinador_id']);
    }

}
