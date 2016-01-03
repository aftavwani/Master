<?php
/* @var $this PriorityController */
/* @var $model Priority */

$this->breadcrumbs=array(
	'Priorities'=>array('index'),
	$model->p_id=>array('view','id'=>$model->p_id),
	'Update',
);

$this->menu=array(
	/* array('label'=>'List Priority', 'url'=>array('index')),
	array('label'=>'Create Priority', 'url'=>array('create')),
	array('label'=>'View Priority', 'url'=>array('view', 'id'=>$model->p_id)), */
	array('label'=>'Manage Priority', 'url'=>array('admin')),
);
?>

<h1>Update Priority : <?php echo $model->p_title; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>