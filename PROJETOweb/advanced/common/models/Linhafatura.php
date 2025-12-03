<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "linhafatura".
 *
 * @property int $id
 * @property int $fatura_id
 * @property int $mes
 * @property int $ano
 * @property float $precounitario
 *
 * @property Fatura $fatura
 */
class Linhafatura extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'linhafatura';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fatura_id', 'mes', 'ano', 'precounitario'], 'required'],
            [['fatura_id', 'mes', 'ano'], 'integer'],
            [['precounitario'], 'number'],
            [['fatura_id'], 'exist', 'skipOnError' => true, 'targetClass' => Fatura::class, 'targetAttribute' => ['fatura_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fatura_id' => 'Fatura ID',
            'mes' => 'Mes',
            'ano' => 'Ano',
            'precounitario' => 'Precounitario',
        ];
    }

    /**
     * Gets query for [[Fatura]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFatura()
    {
        return $this->hasOne(Fatura::class, ['id' => 'fatura_id']);
    }

}
