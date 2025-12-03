<?php

use common\models\Refeicaoalimento;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\RefeicaoalimentoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Refeicaoalimentos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="refeicaoalimento-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Refeicaoalimento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'refeicao_id',
            'alimento_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Refeicaoalimento $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'refeicao_id' => $model->refeicao_id, 'alimento_id' => $model->alimento_id]);
                 }
            ],
        ],
    ]); ?>


</div>
