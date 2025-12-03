<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "exercicio".
 *
 * @property int $id
 * @property string $nome
 * @property string $grupomuscular
 * @property string $descricao
 *
 * @property Planoexercicio[] $planoexercicios
 */
class Exercicio extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'exercicio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'grupomuscular', 'descricao'], 'required'],
            [['nome', 'grupomuscular'], 'string', 'max' => 50],
            [['descricao'], 'string', 'max' => 255],
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
            'grupomuscular' => 'Grupomuscular',
            'descricao' => 'Descricao',
        ];
    }

    /**
     * Gets query for [[Planoexercicios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlanoexercicios()
    {
        return $this->hasMany(Planoexercicio::class, ['exercicio_id' => 'id']);
    }

}
