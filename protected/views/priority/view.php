<?php
/* @var $this PriorityController */
/* @var $model Priority */

$this->breadcrumbs=array(
	'Priorities'=>array('index'),
	$model->p_id,
);

$this->menu=array(
	/* array('label'=>'List Priority', 'url'=>array('index')),
	array('label'=>'Create Priority', 'url'=>array('create')),
	array('label'=>'Update Priority', 'url'=>array('update', 'id'=>$model->p_id)),
	array('label'=>'Delete Priority', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->p_id),'confirm'=>'Are you sure you want to delete this item?')), */
	array('label'=>'Manage Priority', 'url'=>array('admin')),
);
?>

<h1>View Priority #<?php echo $model->p_title; ?></h1>

<?php 
if(Yii::app()->user->hasFlash('success')) {
	echo Yii::app()->user->getFlash('success');
}
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'p_title',
		'p_desc',
		array('name'=>'p_status','value'=>($model->p_status==1)?"Active":"InActive"),
		'p_created',
		'p_parent',
	),
)); ?>
