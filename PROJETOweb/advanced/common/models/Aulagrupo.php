<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "aulagrupo".
 *
 * @property int $id
 * @property string $nomeaula
 * @property string $horario
 * @property string $capacidademaxima
 * @property int $treinador_id
 *
 * @property Reservaula[] $reservaulas
 * @property Profile $treinador
 */
class Aulagrupo extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aulagrupo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomeaula', 'horario', 'capacidademaxima', 'treinador_id'], 'required'],
            [['horario'], 'safe'],
            [['treinador_id'], 'integer'],
            [['nomeaula'], 'string', 'max' => 150],
            [['capacidademaxima'], 'string', 'max' => 50],
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
            'nomeaula' => 'Nomeaula',
            'horario' => 'Horario',
            'capacidademaxima' => 'Capacidademaxima',
            'treinador_id' => 'Treinador ID',
        ];
    }

    /**
     * Gets query for [[Reservaulas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReservaulas()
    {
        return $this->hasMany(Reservaula::class, ['aula_id' => 'id']);
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
