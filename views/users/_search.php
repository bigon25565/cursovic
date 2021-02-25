<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ModuleUsersSeacrh */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="module-users-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>


    <?= $form->field($model, 'group_id')->label('Группа') ?>

    <?= $form->field($model, 'FIO') ?>

    <?= $form->field($model, 'mail') ?>

    <?= $form->field($model, 'role') ?>

    <?php // echo $form->field($model, 'login') ?>

    <?php // echo $form->field($model, 'password') ?>

    <div class="form-group">
        <?= Html::submitButton('Найти', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Обновить', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
