<?php
/* @var $this RemindersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Reminders',
);

$this->menu=array(
	array('label'=>'Create Reminders', 'url'=>array('create')),
	array('label'=>'Manage Reminders', 'url'=>array('admin')),
);
?>

<h1>Reminders</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
