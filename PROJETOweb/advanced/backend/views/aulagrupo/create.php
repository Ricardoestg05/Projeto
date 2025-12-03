<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Aulagrupo $model */

$this->title = 'Create Aulagrupo';
$this->params['breadcrumbs'][] = ['label' => 'Aulagrupos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aulagrupo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
