<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\ModuleGroup;
use app\models\ModuleLessons;
use app\models\ModuleUsers;

class ModuleController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionDates()
    {
    	$model = new ModuleGroup;
    	$groups = ModuleGroup::find()->all();
    	$options = [];
    	foreach ($groups as $key) {
    		$options = $options + [$key['id'] => $key['number']];
    	}
    	if ($model->load(\Yii::$app->request->post())) {
    		$monday = ModuleLessons::find()->where(['group_id' => $model['number'], 'weekday' => '1'])->all();
    		$tuesday = ModuleLessons::find()->where(['group_id' => $model['number'], 'weekday' => '2'])->all();
    		$wednesday = ModuleLessons::find()->where(['group_id' => $model['number'], 'weekday' => '3'])->all();
    		$thursday = ModuleLessons::find()->where(['group_id' => $model['number'], 'weekday' => '4'])->all();
    		$friday = ModuleLessons::find()->where(['group_id' => $model['number'], 'weekday' => '5'])->all();
    	}
        return $this->render('dates', [
        	'model' => $model,
        	'options' => $options,
        	'monday' => $monday,
        	'tuesday' => $tuesday,
        	'wednesday' => $wednesday,
        	'thursday' => $thursday,
        	'friday' => $friday,
        ]);
    }

    public function actionLogin()
    {
        $model = new ModuleUsers;
        if ($model->load(\Yii::$app->request->post())) {
            $user = ModuleUsers::find()->where(['login' => $model['login'], 'password' => $model['password']])->one();
            if($user)
            {
                session_start();
                $_SESSION["role"]=$user['role'];
                $_SESSION["FIO"]=$user['FIO'];
                $error = 'Вход выполнен успешно!';
            }else{
                $error = 'Пользователя с таким сочетанием логина и пароля не найдено';
            }
        }
        return $this->render('login',['model' => $model, 'error' => $error]);
    }

    public function actionLeave()
    {
        session_destroy();
        return $this->redirect('login');
    }

}
