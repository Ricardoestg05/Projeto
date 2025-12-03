<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Refeicaoalimento $model */

$this->title = 'Create Refeicaoalimento';
$this->params['breadcrumbs'][] = ['label' => 'Refeicaoalimentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="refeicaoalimento-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
