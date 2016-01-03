<?php
/* @var $this SourceController */
/* @var $model Source */

$this->breadcrumbs=array(
	'Sources'=>array('index'),
	$model->s_id,
);

$this->menu=array(
	array('label'=>'Create Source', 'url'=>array('create')),
	/* array('label'=>'Update Source', 'url'=>array('update', 'id'=>$model->s_id)),
	array('label'=>'Delete Source', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->s_id),'confirm'=>'Are you sure you want to delete this item?')), */
	array('label'=>'Manage Source', 'url'=>array('admin')),
);
?>

<h1>View Source #<?php echo $model->s_tite; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		's_id',
		's_tite',
		's_desc',
		's_created',
		's_modified',
	),
)); ?>
