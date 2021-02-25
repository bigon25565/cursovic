<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ModuleLessonsSeacrh */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Module Lessons';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="module-lessons-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Module Lessons', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['attribute' => 'lasson_name', 'label' => 'Урок'],
            ['attribute' => 'number', 'label' => 'Номер группы', 'value' => 'group.number'],
            ['attribute' => 'weekday', 'label' => 'День недели'],
            ['attribute' => 'lesson_order', 'label' => 'Номер урока'],
            ['attribute' => 'FIO', 'label' => 'Преподаватель', 'value' => 'teacher.FIO'],
            ['attribute' => 'cab', 'label' => 'Кабинет'],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>



</div>
