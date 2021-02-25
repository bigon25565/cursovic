<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ModuleUsers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="module-users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'group_id')->textInput()->label('Группа') ?>

    <?= $form->field($model, 'FIO')->textInput(['maxlength' => true])->label('ФИО') ?>

    <?= $form->field($model, 'mail')->textInput(['maxlength' => true])->label('Почта') ?>

    <?= $form->field($model, 'role')->textInput()->label('Роль') ?>

    <?php if($update != 1){ echo $form->field($model, 'login')->textInput(['maxlength' => true])->label('Логин');} ?>

    <?php if($update != 1){ echo $form->field($model, 'password')->passwordInput(['maxlength' => true])->label('Пароль');} ?>

    <div class="form-group">
        <?= $error ?>
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
