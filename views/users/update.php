<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ModuleUsers */

$this->title = 'Редактирование пользователя: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Module Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="module-users-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'update' => $update,
    ]) ?>

</div>
