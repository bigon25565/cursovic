<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ModuleUsersSeacrh */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список Пользователей';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="module-users-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать пользователя', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['attribute' => 'group_id', 'label' => 'Группа'],
            ['attribute' => 'FIO', 'label' => 'ФИО'],
            ['attribute' => 'mail', 'label' => 'Почта'],
            ['attribute' => 'role', 'label' => 'Роль'],
            //'login',
            //'password',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
