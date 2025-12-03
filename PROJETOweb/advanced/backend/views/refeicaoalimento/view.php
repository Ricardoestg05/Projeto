<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Refeicaoalimento $model */

$this->title = $model->refeicao_id;
$this->params['breadcrumbs'][] = ['label' => 'Refeicaoalimentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="refeicaoalimento-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'refeicao_id' => $model->refeicao_id, 'alimento_id' => $model->alimento_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'refeicao_id' => $model->refeicao_id, 'alimento_id' => $model->alimento_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'refeicao_id',
            'alimento_id',
        ],
    ]) ?>

</div>
