<?php
/* @var $this RemindersController */
/* @var $model Reminders */

$this->breadcrumbs=array(
	'Reminders'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Reminders', 'url'=>array('index')),
	array('label'=>'Create Reminders', 'url'=>array('create')),
	array('label'=>'Update Reminders', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Reminders', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Reminders', 'url'=>array('admin')),
);
?>

<h1>View Reminders #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'lead_id',
		'date',
		'time',
		
	),
)); ?>
