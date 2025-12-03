<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Refeicao $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="refeicao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'plano_id')->textInput() ?>

    <?= $form->field($model, 'tiporefeicao')->dropDownList([ 'Pequeno-Almoço' => 'Pequeno-Almoço', 'Almoço' => 'Almoço', 'Lanche' => 'Lanche', 'Jantar' => 'Jantar', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'diaplano')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
