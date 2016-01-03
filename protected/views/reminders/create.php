<?php
/* @var $this RemindersController */
/* @var $model Reminders */

$this->breadcrumbs=array(
	'Reminders'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Reminders', 'url'=>array('index')),
	array('label'=>'Manage Reminders', 'url'=>array('admin')),
);
?>

<h1>Create Reminders</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>