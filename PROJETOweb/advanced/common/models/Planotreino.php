<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "planotreino".
 *
 * @property int $id
 * @property int $cliente_id
 * @property int $treinador_id
 * @property string $datacriacao
 * @property string $observacoes
 *
 * @property Profile $cliente
 * @property Planoexercicio[] $planoexercicios
 * @property Profile $treinador
 */
class Planotreino extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'planotreino';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cliente_id', 'treinador_id', 'datacriacao', 'observacoes'], 'required'],
            [['cliente_id', 'treinador_id'], 'integer'],
            [['datacriacao'], 'safe'],
            [['observacoes'], 'string', 'max' => 150],
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
            'datacriacao' => 'Datacriacao',
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
     * Gets query for [[Planoexercicios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlanoexercicios()
    {
        return $this->hasMany(Planoexercicio::class, ['plano_id' => 'id']);
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
