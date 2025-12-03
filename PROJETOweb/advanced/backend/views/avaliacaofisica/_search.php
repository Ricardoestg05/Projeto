<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\AvaliacaofisicaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="avaliacaofisica-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cliente_id') ?>

    <?= $form->field($model, 'treinador_id') ?>

    <?= $form->field($model, 'datavaliacao') ?>

    <?= $form->field($model, 'peso') ?>

    <?php // echo $form->field($model, 'altura') ?>

    <?php // echo $form->field($model, 'imc') ?>

    <?php // echo $form->field($model, 'observacoes') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
