<?php
use yii\helpers\Html;
?>
<div class="d-flex align-items-center justify-content-center min-vh-100">

    <div class="card login-card-custom px-5 py-2">
        <div class="card-body login-card-body">

            <div class="text-center mb-4">
                <img src="./img/logo_athlos.png" alt="Logotipo" style="max-width: 120px;">
                <h5 class="mt-2 fw-bold">Login</h5>
            </div>

            <p class="login-box-msg">Faça login para começar a sua sessão:</p>

            <?php $form = \yii\bootstrap4\ActiveForm::begin(['id' => 'login-form']) ?>

            <?= $form->field($model,'username', [
                // ... (restante do código do campo username) ...
                'options' => ['class' => 'form-group has-feedback'],
                'template' => '{beginWrapper}{input}{error}{endWrapper}',
                'wrapperOptions' => ['class' => 'input-group mb-3']
            ])
                ->label(false)
                ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

            <?= $form->field($model, 'password', [
                // ... (restante do código do campo password) ...
                'options' => ['class' => 'form-group has-feedback'],
                'template' => '{beginWrapper}{input}{error}{endWrapper}',
                'wrapperOptions' => ['class' => 'input-group mb-3']
            ])
                ->label(false)
                ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>


            <div class="row">

                <div class="col">
                    <?= Html::submitButton('Log In', ['class' => 'btn btn-primary w-100']) ?>
                </div>
            </div>

            <?php \yii\bootstrap4\ActiveForm::end(); ?>


        </div>
    </div>
</div>

