<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ModuleLessons */

$this->title = 'Редактировать урок: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Module Lessons', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="module-lessons-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'update' => 1,
        'options_groups' => $options_groups,
        'options_teachers' => $options_teachers,
        'error' => $error,
    ]) ?>

</div>
