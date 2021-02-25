<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ModuleLessons */

$this->title = 'Create Module Lessons';
$this->params['breadcrumbs'][] = ['label' => 'Module Lessons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="module-lessons-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'options_groups' => $options_groups,
		'options_teachers' => $options_teachers,
		'update' => 0,
        'error' => $error,
    ]) ?>

</div>
