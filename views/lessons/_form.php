<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ModuleLessons */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="module-lessons-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lasson_name')->textInput(['maxlength' => true]) ?>

    <?php if($update != 1){ echo $form->field($model, 'group_id')->dropDownList($options_groups);} ?>

    <?php if($update != 1){ echo $form->field($model, 'weekday')->dropDownList([
        '1' => 'Понедельник',
        '2' => 'Вторник',
        '3' => 'Среда',
        '4' => 'Четверг',
        '5' => 'Пятница',
    ]);} ?>

    <?php if($update != 1){ echo $form->field($model, 'lesson_order')->dropDownList([
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4',
        '5' => '5',
        '6' => '6',
        '7' => '7',
        '8' => '8',
    ]);} ?>

    <?= $form->field($model, 'teacher_id')->dropDownList($options_teachers) ?>

    <?= $form->field($model, 'cab')->textInput() ?>

    <div class="form-group">
        <?= $error ?>
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
