<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\widgets\Pjax;
use app\models\ModuleUsers;
?>
<h1>Расписание</h1>
<?php
	$form = ActiveForm::begin([
	    'id' => 'form-input-example',
	    'options' => [
	        'class' => 'form-horizontal col-lg-11',
	        'enctype' => 'multipart/form-data'
	    ],
	]);
	echo $form->field($model, 'number')->dropDownList($options)->label('Номер группы');
	echo Html::submitButton('Подтвердить', ['class' => 'btn btn-primary']);
	if ($_SESSION['role'] == 1) {
		echo '<a class="btn btn-success" href="http://basic/lessons/index">Редактировать</a>';
	}
	ActiveForm::end();
?>

<div class="row">
	<div class="col-md-4">
		<div class="x_panel">
			<div class="x_title"><h2>Понедельник</h2><div class="clearfix"></div></div>
			<div class="x_content">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Предмет</th>
							<th>Преподаватель</th>
							<th>Кабинет</th>
						</tr>
					</thead>
					<tbody>
						<?php if($monday){ $i = 1; foreach ($monday as $key) {
							echo '<tr><th scope="row">'.$i.'</th><td>'.$key['lasson_name'].'</td><td>'.$key->teacher['FIO'].'</td><td>'.$key['cab'].'</td></tr>';
							$i++;
						}} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="x_panel">
			<div class="x_title"><h2>Вторник</h2><div class="clearfix"></div></div>
			<div class="x_content">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Предмет</th>
							<th>Преподаватель</th>
							<th>Кабинет</th>
						</tr>
					</thead>
					<tbody>
						<?php if($tuesday){ $i = 1; foreach ($tuesday as $key) {
							echo '<tr><th scope="row">'.$i.'</th><td>'.$key['lasson_name'].'</td><td>'.$key->teacher['FIO'].'</td><td>'.$key['cab'].'</td></tr>';
							$i++;
						}} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="x_panel">
			<div class="x_title"><h2>Среда</h2><div class="clearfix"></div></div>
			<div class="x_content">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Предмет</th>
							<th>Преподаватель</th>
							<th>Кабинет</th>
						</tr>
					</thead>
					<tbody>
						<?php if($wednesday){ $i = 1; foreach ($wednesday as $key) {
							echo '<tr><th scope="row">'.$i.'</th><td>'.$key['lasson_name'].'</td><td>'.$key->teacher['FIO'].'</td><td>'.$key['cab'].'</td></tr>';
							$i++;
						}} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		<div class="x_panel">
			<div class="x_title"><h2>Четверг</h2><div class="clearfix"></div></div>
			<div class="x_content">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Предмет</th>
							<th>Преподаватель</th>
							<th>Кабинет</th>
						</tr>
					</thead>
					<tbody>
						<?php if($thursday){ $i = 1; foreach ($thursday as $key) {
							echo '<tr><th scope="row">'.$i.'</th><td>'.$key['lasson_name'].'</td><td>'.$key->teacher['FIO'].'</td><td>'.$key['cab'].'</td></tr>';
							$i++;
						}} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="x_panel">
			<div class="x_title"><h2>Пятница</h2><div class="clearfix"></div></div>
			<div class="x_content">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Предмет</th>
							<th>Преподаватель</th>
							<th>Кабинет</th>
						</tr>
					</thead>
					<tbody>
						<?php if($friday){ $i = 1; foreach ($friday as $key) {
							echo '<tr><th scope="row">'.$i.'</th><td>'.$key['lasson_name'].'</td><td>'.$key->teacher['FIO'].'</td><td>'.$key['cab'].'</td></tr>';
							$i++;
						}} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>