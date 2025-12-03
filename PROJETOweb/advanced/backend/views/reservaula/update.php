<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Reservaula $model */

$this->title = 'Update Reservaula: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Reservaulas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="reservaula-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
