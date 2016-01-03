<?php
/* @var $this RemindersController */
/* @var $model Reminders */

$this->breadcrumbs=array(
	'Reminders'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Reminders', 'url'=>array('index')),
	array('label'=>'Create Reminders', 'url'=>array('create')),
	array('label'=>'View Reminders', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Reminders', 'url'=>array('admin')),
);
?>

<h1>Update Reminders <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>