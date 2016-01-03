<?php

/* @var $this LeadController */
/* @var $model Lead */

/*  $this->breadcrumbs=array(
	'Leads'=>array('index'),
	'Create',
); */

	
$this->menu=array(
	//array('label'=>'List Lead', 'url'=>array('index')),
	array('label'=>'Manage Lead', 'url'=>array('admin')),
);
	
?>



<?php $this->renderPartial('_form', array('model'=>$model,'result'=>$models,'proper'=>$props )); ?>