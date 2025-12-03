<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Mensagem $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="mensagem-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'remetente_id')->textInput() ?>

    <?= $form->field($model, 'destinatario_id')->textInput() ?>

    <?= $form->field($model, 'conteudo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dataenvio')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
