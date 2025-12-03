<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "planoalimentar".
 *
 * @property int $id
 * @property int $cliente_id
 * @property int $nutricionista_id
 * @property string $datainicio
 * @property string $observacoes
 *
 * @property Profile $cliente
 * @property Profile $nutricionista
 * @property Refeicao[] $refeicaos
 */
class Planoalimentar extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'planoalimentar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cliente_id', 'nutricionista_id', 'datainicio', 'observacoes'], 'required'],
            [['cliente_id', 'nutricionista_id'], 'integer'],
            [['datainicio'], 'safe'],
            [['observacoes'], 'string', 'max' => 255],
            [['cliente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::class, 'targetAttribute' => ['cliente_id' => 'id']],
            [['nutricionista_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::class, 'targetAttribute' => ['nutricionista_id' => 'id']],
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
            'nutricionista_id' => 'Nutricionista ID',
            'datainicio' => 'Datainicio',
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
     * Gets query for [[Nutricionista]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNutricionista()
    {
        return $this->hasOne(Profile::class, ['id' => 'nutricionista_id']);
    }

    /**
     * Gets query for [[Refeicaos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRefeicaos()
    {
        return $this->hasMany(Refeicao::class, ['plano_id' => 'id']);
    }

}
