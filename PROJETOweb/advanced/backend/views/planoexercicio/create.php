<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Planoexercicio $model */

$this->title = 'Create Planoexercicio';
$this->params['breadcrumbs'][] = ['label' => 'Planoexercicios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="planoexercicio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
