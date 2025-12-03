<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Planotreino $model */

$this->title = 'Create Planotreino';
$this->params['breadcrumbs'][] = ['label' => 'Planotreinos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="planotreino-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
