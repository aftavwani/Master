<?php
/* @var $this PropertyDetailsController */
/* @var $model PropertyDetails */
/* 
$this->breadcrumbs=array(
	'Propery Details'=>array('index'),
	'Create',
); */

$this->menu=array(
	//array('label'=>'List PropertyDetails', 'url'=>array('index')),
	array('label'=>'Manage PropertyDetails', 'url'=>array('admin')),
);
?>

<h1 class="mid_hed">Create PropertyDetails</h1>
<hr/>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>