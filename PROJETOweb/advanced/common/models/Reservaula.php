<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "reservaula".
 *
 * @property int $id
 * @property int $cliente_id
 * @property int $aula_id
 * @property string $datareserva
 *
 * @property Aulagrupo $aula
 * @property Profile $cliente
 */
class Reservaula extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reservaula';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cliente_id', 'aula_id', 'datareserva'], 'required'],
            [['cliente_id', 'aula_id'], 'integer'],
            [['datareserva'], 'safe'],
            [['cliente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::class, 'targetAttribute' => ['cliente_id' => 'id']],
            [['aula_id'], 'exist', 'skipOnError' => true, 'targetClass' => Aulagrupo::class, 'targetAttribute' => ['aula_id' => 'id']],
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
            'aula_id' => 'Aula ID',
            'datareserva' => 'Datareserva',
        ];
    }

    /**
     * Gets query for [[Aula]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAula()
    {
        return $this->hasOne(Aulagrupo::class, ['id' => 'aula_id']);
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

}
