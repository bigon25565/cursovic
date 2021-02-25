<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ModuleUsers */
/* @var $form ActiveForm */
?>
<div class="module-login">

    <?php $form = ActiveForm::begin([
	    'id' => 'login',
	    'options' => [
	        'class' => 'form-horizontal form-label-left'
	    ],
	]); ?>
	    <div class="row">
	    	<div class="col-md-4">
	    		<div class="x_panel">
	    			<div class="x_title">
	    				<h2>Вход</h2>
	    				<div class="clearfix"></div>
	    			</div>
	    			<div class="x_content">
			    		<?= $form->field($model, 'login')->label('Логин') ?>
				        <?= $form->field($model, 'password')->label('Пароль') ?> 
				        <?= $error ?> 
				        <div class="form-group">
				            <?= Html::submitButton('Войти', ['class' => 'btn btn-primary']) ?>
				        </div>	    				
	    			</div>
	    		</div>		
	    	</div>
	    </div>
    <?php ActiveForm::end(); ?>

</div><!-- module-login -->
