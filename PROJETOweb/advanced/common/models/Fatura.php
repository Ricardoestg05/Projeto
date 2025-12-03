<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "fatura".
 *
 * @property int $id
 * @property int $cliente_id
 * @property string $dataemissao
 * @property float $valortotal
 * @property string $descricao
 *
 * @property Profile $cliente
 * @property Linhafatura[] $linhafaturas
 */
class Fatura extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fatura';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cliente_id', 'dataemissao', 'valortotal', 'descricao'], 'required'],
            [['cliente_id'], 'integer'],
            [['dataemissao'], 'safe'],
            [['valortotal'], 'number'],
            [['descricao'], 'string', 'max' => 250],
            [['cliente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::class, 'targetAttribute' => ['cliente_id' => 'id']],
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
            'dataemissao' => 'Dataemissao',
            'valortotal' => 'Valortotal',
            'descricao' => 'Descricao',
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
     * Gets query for [[Linhafaturas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLinhafaturas()
    {
        return $this->hasMany(Linhafatura::class, ['fatura_id' => 'id']);
    }

}
