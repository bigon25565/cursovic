<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ModuleLessons */
/* @var $form ActiveForm */
?>
<div class="module-redact">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'lasson_name') ?>
        <?= $form->field($model, 'group_id') ?>
        <?= $form->field($model, 'weekday') ?>
        <?= $form->field($model, 'lesson_order') ?>
        <?= $form->field($model, 'teacher_id') ?>
        <?= $form->field($model, 'cab') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- module-redact -->
