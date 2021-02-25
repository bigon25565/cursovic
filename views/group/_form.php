<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ModuleGroup */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="module-group-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'number')->textInput(['maxlength' => true])->label('Номер') ?>

    <?= $form->field($model, 'spec')->textInput(['maxlength' => true])->label('Специальность') ?>

    <div class="form-group">
    	<?= $error ?>
        <?= Html::submitButton('Создать', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
