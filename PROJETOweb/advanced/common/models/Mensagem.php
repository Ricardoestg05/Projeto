<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mensagem".
 *
 * @property int $id
 * @property int $remetente_id
 * @property int $destinatario_id
 * @property string $conteudo
 * @property string $dataenvio
 *
 * @property Profile $destinatario
 * @property Profile $remetente
 */
class Mensagem extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mensagem';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['remetente_id', 'destinatario_id', 'conteudo', 'dataenvio'], 'required'],
            [['remetente_id', 'destinatario_id'], 'integer'],
            [['dataenvio'], 'safe'],
            [['conteudo'], 'string', 'max' => 50],
            [['remetente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::class, 'targetAttribute' => ['remetente_id' => 'id']],
            [['destinatario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::class, 'targetAttribute' => ['destinatario_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'remetente_id' => 'Remetente ID',
            'destinatario_id' => 'Destinatario ID',
            'conteudo' => 'Conteudo',
            'dataenvio' => 'Dataenvio',
        ];
    }

    /**
     * Gets query for [[Destinatario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDestinatario()
    {
        return $this->hasOne(Profile::class, ['id' => 'destinatario_id']);
    }

    /**
     * Gets query for [[Remetente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRemetente()
    {
        return $this->hasOne(Profile::class, ['id' => 'remetente_id']);
    }

}
