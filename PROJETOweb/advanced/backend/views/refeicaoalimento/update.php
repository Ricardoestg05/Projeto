<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Refeicaoalimento $model */

$this->title = 'Update Refeicaoalimento: ' . $model->refeicao_id;
$this->params['breadcrumbs'][] = ['label' => 'Refeicaoalimentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->refeicao_id, 'url' => ['view', 'refeicao_id' => $model->refeicao_id, 'alimento_id' => $model->alimento_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="refeicaoalimento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
