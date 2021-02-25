<?php

namespace app\controllers;

use Yii;
use app\models\ModuleGroup;
use app\models\ModuleLessons;
use app\models\ModuleLessonsSeacrh;
use app\models\ModuleUsers;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LessonsController implements the CRUD actions for ModuleLessons model.
 */
class LessonsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ModuleLessons models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ModuleLessonsSeacrh();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ModuleLessons model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ModuleLessons model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ModuleLessons();

        $groups = ModuleGroup::find()->all();
        $teachers = ModuleUsers::find()->where(['role' => 2])->all();

        $options_teachers = [];
        foreach ($teachers as $key) {
            $options_teachers = $options_teachers + [$key['id'] => $key['FIO']];
        }
        $options_groups = [];
        foreach ($groups as $key) {
            $options_groups = $options_groups + [$key['id'] => $key['number']];
        }

        if ($model->load(Yii::$app->request->post())) {
            if (ModuleLessons::find()->where(['cab' => $model['cab'], 'weekday' => $model['weekday'], 'lesson_order' => $model['lesson_order']])->one()) {
                return $this->render('create', [
                    'model' => $model,
                    'options_groups' => $options_groups,
                    'options_teachers' => $options_teachers,
                    'error' => 'Данный кабинет уже занят в это время! Измените урок с занятым кабинетом или выберите другой',
                ]);
            }
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'options_groups' => $options_groups,
            'options_teachers' => $options_teachers,
        ]);
    }

    /**
     * Updates an existing ModuleLessons model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $groups = ModuleGroup::find()->all();
        $teachers = ModuleUsers::find()->where(['role' => 2])->all();

        $options_teachers = [];
        foreach ($teachers as $key) {
            $options_teachers = $options_teachers + [$key['id'] => $key['FIO']];
        }
        $options_groups = [];
        foreach ($groups as $key) {
            $options_groups = $options_groups + [$key['id'] => $key['number']];
        }

        if ($model->load(Yii::$app->request->post())) {
            if (ModuleLessons::find()->where(['cab' => $model['cab'], 'weekday' => $model['weekday'], 'lesson_order' => $model['lesson_order']])) {
                if (ModuleLessons::find()->where(['cab' => $model['cab'], 'weekday' => $model['weekday'], 'lesson_order' => $model['lesson_order'], 'group_id' => $model['group_id']])) {
                    $model->save(false);
                    return $this->redirect(['view', 'id' => $model->id]);
                }
                return $this->render('update', [
                    'model' => $model,
                    'options_groups' => $options_groups,
                    'options_teachers' => $options_teachers,
                    'error' => 'Данный кабинет уже занят в это время! Измените урок с занятым кабинетом или выберите другой',
                ]);
            }
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'options_groups' => $options_groups,
            'options_teachers' => $options_teachers,
        ]);
    }

    /**
     * Deletes an existing ModuleLessons model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ModuleLessons model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ModuleLessons the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ModuleLessons::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
