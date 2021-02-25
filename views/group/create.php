<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ModuleGroup */

$this->title = 'Создание группы';
$this->params['breadcrumbs'][] = ['label' => 'Module Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="module-group-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
