<?php
/* @var $this PropertyDetailsController */
/* @var $model PropertyDetails */

/* $this->breadcrumbs=array(
	'Propery Details'=>array('index'),
	'Manage', 
);*/

$this->menu=array(
	//array('label'=>'List PropertyDetails', 'url'=>array('index')),
	array('label'=>'Create PropertyDetails', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#propery-details-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:block">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'propery-details-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array('header'=>'SN.',
          'value'=>'++$row',
		),
		'status',	
		'propert_name',
		array(
            'name' => 'image',
			'type' =>'raw',
           'value' => 'CHtml::image(Yii::app()->baseUrl."/uploads/img/" . $data->image,"image",array("width"=>"144","height"=>"66"))'

        ),
	
		'price',
		'property_type',
		
		
		/*
		'mls',
		'category',
		'property_type',
		'style',
		'street_address',
		'unit',
		'country',
		'state',
		'city',
		'propert_title',
	
		*/                                                   
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
