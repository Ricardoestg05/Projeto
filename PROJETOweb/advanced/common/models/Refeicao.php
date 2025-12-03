<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "refeicao".
 *
 * @property int $id
 * @property int $plano_id
 * @property string $tiporefeicao
 * @property int $diaplano
 *
 * @property Alimento[] $alimentos
 * @property Planoalimentar $plano
 * @property RefeicaoAlimento[] $refeicaoAlimentos
 */
class Refeicao extends \yii\db\ActiveRecord
{

    /**
     * ENUM field values
     */
    const TIPOREFEICAO_PEQUENO_ALMOCO = 'Pequeno-Almoço';
    const TIPOREFEICAO_ALMOCO = 'Almoço';
    const TIPOREFEICAO_LANCHE = 'Lanche';
    const TIPOREFEICAO_JANTAR = 'Jantar';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'refeicao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['plano_id', 'tiporefeicao', 'diaplano'], 'required'],
            [['plano_id', 'diaplano'], 'integer'],
            [['tiporefeicao'], 'string'],
            ['tiporefeicao', 'in', 'range' => array_keys(self::optsTiporefeicao())],
            [['plano_id'], 'exist', 'skipOnError' => true, 'targetClass' => Planoalimentar::class, 'targetAttribute' => ['plano_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'plano_id' => 'Plano ID',
            'tiporefeicao' => 'Tiporefeicao',
            'diaplano' => 'Diaplano',
        ];
    }

    /**
     * Gets query for [[Alimentos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAlimentos()
    {
        return $this->hasMany(Alimento::class, ['id' => 'alimento_id'])->viaTable('refeicao_alimento', ['refeicao_id' => 'id']);
    }

    /**
     * Gets query for [[Plano]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlano()
    {
        return $this->hasOne(Planoalimentar::class, ['id' => 'plano_id']);
    }

    /**
     * Gets query for [[RefeicaoAlimentos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRefeicaoAlimentos()
    {
        return $this->hasMany(RefeicaoAlimento::class, ['refeicao_id' => 'id']);
    }


    /**
     * column tiporefeicao ENUM value labels
     * @return string[]
     */
    public static function optsTiporefeicao()
    {
        return [
            self::TIPOREFEICAO_PEQUENO_ALMOCO => 'Pequeno-Almoço',
            self::TIPOREFEICAO_ALMOCO => 'Almoço',
            self::TIPOREFEICAO_LANCHE => 'Lanche',
            self::TIPOREFEICAO_JANTAR => 'Jantar',
        ];
    }

    /**
     * @return string
     */
    public function displayTiporefeicao()
    {
        return self::optsTiporefeicao()[$this->tiporefeicao];
    }

    /**
     * @return bool
     */
    public function isTiporefeicaoPequenoAlmoco()
    {
        return $this->tiporefeicao === self::TIPOREFEICAO_PEQUENO_ALMOCO;
    }

    public function setTiporefeicaoToPequenoAlmoco()
    {
        $this->tiporefeicao = self::TIPOREFEICAO_PEQUENO_ALMOCO;
    }

    /**
     * @return bool
     */
    public function isTiporefeicaoAlmoco()
    {
        return $this->tiporefeicao === self::TIPOREFEICAO_ALMOCO;
    }

    public function setTiporefeicaoToAlmoco()
    {
        $this->tiporefeicao = self::TIPOREFEICAO_ALMOCO;
    }

    /**
     * @return bool
     */
    public function isTiporefeicaoLanche()
    {
        return $this->tiporefeicao === self::TIPOREFEICAO_LANCHE;
    }

    public function setTiporefeicaoToLanche()
    {
        $this->tiporefeicao = self::TIPOREFEICAO_LANCHE;
    }

    /**
     * @return bool
     */
    public function isTiporefeicaoJantar()
    {
        return $this->tiporefeicao === self::TIPOREFEICAO_JANTAR;
    }

    public function setTiporefeicaoToJantar()
    {
        $this->tiporefeicao = self::TIPOREFEICAO_JANTAR;
    }
}
