<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ModuleUsers */

$this->title = 'Создание пользователя';
$this->params['breadcrumbs'][] = ['label' => 'Module Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="module-users-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'error' => $error,
    ]) ?>

</div>
