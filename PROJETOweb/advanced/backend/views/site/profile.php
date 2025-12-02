<?php
$this->title = 'Perfil';
$this->params['breadcrumbs'] = [['label' => $this->title]];
use yii\helpers\Url;
?>

<div class="col-md-4 col-sm-6 col-12">
    <?= \hail812\adminlte\widgets\InfoBox::widget([
        'text' => 'Events',
        'number' => '41,410',
        'theme' => 'gradient-warning',
        'icon' => 'far fa-calendar-alt',
        'progress' => [
            'width' => '70%',
            'description' => '70% Increase in 30 Days'
        ],
        'loadingStyle' => true
    ]) ?>
</div>
