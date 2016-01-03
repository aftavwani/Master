<?php
/* @var $this LeadUsersController */
/* @var $model LeadUsers */

$this->breadcrumbs=array(
	'Lead Users'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List LeadUsers', 'url'=>array('index')),
	array('label'=>'Create LeadUsers', 'url'=>array('create')),
	array('label'=>'Update LeadUsers', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete LeadUsers', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LeadUsers', 'url'=>array('admin')),
);
?>

<h1>View LeadUsers #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'leads_id',
	),
)); ?>
