<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ModuleGroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список групп';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="module-group-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать группу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['attribute' => 'id'],
            ['attribute' => 'number', 'label' => 'Номер'],
            ['attribute' => 'spec', 'label' => 'Специальность'],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
