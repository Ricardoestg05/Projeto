<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Avaliacaofisica $model */

$this->title = 'Update Avaliacaofisica: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Avaliacaofisicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="avaliacaofisica-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
