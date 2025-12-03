<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Planoexercicio $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="planoexercicio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'plano_id')->textInput() ?>

    <?= $form->field($model, 'exercicio_id')->textInput() ?>

    <?= $form->field($model, 'series')->textInput() ?>

    <?= $form->field($model, 'repeticoes')->textInput() ?>

    <?= $form->field($model, 'tempodescanso')->textInput() ?>

    <?= $form->field($model, 'observacoes')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
