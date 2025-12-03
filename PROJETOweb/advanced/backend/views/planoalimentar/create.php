<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Planoalimentar $model */

$this->title = 'Create Planoalimentar';
$this->params['breadcrumbs'][] = ['label' => 'Planoalimentars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="planoalimentar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
