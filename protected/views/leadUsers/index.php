<?php
/* @var $this LeadUsersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Lead Users',
);

$this->menu=array(
	array('label'=>'Create LeadUsers', 'url'=>array('create')),
	array('label'=>'Manage LeadUsers', 'url'=>array('admin')),
);
?>

<h1>Lead Users</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
