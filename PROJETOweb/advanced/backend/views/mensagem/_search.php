<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\MensagemSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="mensagem-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'remetente_id') ?>

    <?= $form->field($model, 'destinatario_id') ?>

    <?= $form->field($model, 'conteudo') ?>

    <?= $form->field($model, 'dataenvio') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
