<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Aulagrupo $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="aulagrupo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomeaula')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'horario')->textInput() ?>

    <?= $form->field($model, 'capacidademaxima')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'treinador_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
