<?php
/* @var $this PriorityController */
/* @var $model Priority */

/* $this->breadcrumbs=array(
	'Priorities'=>array('index'),
	'Manage',
); */

$this->menu=array(
	/* array('label'=>'List Priority', 'url'=>array('index')), */
	array('label'=>'Create Priority', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#priority-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Priorities</h1>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'priority-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array('header'=>'SN.', 'value'=>'++$row'),
		//'p_parent',
		array('name'=>'p_parent', 'value'=>array($model, 'getPriorityParent')),
		'p_title',
		'p_desc',
		array('name'=>'p_status','value'=>'($data->p_status==1)?"Active":"Inactive"'),
		'p_created',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
