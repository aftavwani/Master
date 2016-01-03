<?php
/* @var $this SourceController */
/* @var $model Source */

$this->breadcrumbs=array(
	'Sources'=>array('index'),
	$model->s_id=>array('view','id'=>$model->s_id),
	'Update',
);

$this->menu=array(
	/* array('label'=>'List Source', 'url'=>array('index')),
	array('label'=>'Create Source', 'url'=>array('create')),
	array('label'=>'View Source', 'url'=>array('view', 'id'=>$model->s_id)), */
	array('label'=>'Manage Source', 'url'=>array('admin')),
);
?>

<h1>Update Source <?php echo $model->s_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>