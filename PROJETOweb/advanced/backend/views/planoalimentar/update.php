<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Planoalimentar $model */

$this->title = 'Update Planoalimentar: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Planoalimentars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="planoalimentar-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
