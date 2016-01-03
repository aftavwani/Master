<?php
/* @var $this SourceController */
/* @var $model Source */

$this->breadcrumbs=array(
	'Sources'=>array('index'),
	'Manage',
);

$this->menu=array(
	/* array('label'=>'List Source', 'url'=>array('index')), */
	array('label'=>'Create Source', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#source-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Sources</h1>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'source-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		's_id',
		's_tite',
		's_desc',
		's_created',
		's_modified',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
