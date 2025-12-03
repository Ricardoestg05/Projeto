<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\PlanoexercicioSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="planoexercicio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'plano_id') ?>

    <?= $form->field($model, 'exercicio_id') ?>

    <?= $form->field($model, 'series') ?>

    <?= $form->field($model, 'repeticoes') ?>

    <?php // echo $form->field($model, 'tempodescanso') ?>

    <?php // echo $form->field($model, 'observacoes') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
