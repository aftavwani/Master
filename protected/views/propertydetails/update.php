 <?php
/* @var $this PropertyDetailsController */
/* @var $model PropertyDetails */

/* $this->breadcrumbs=array(
	'Propery Details'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
); */

$this->menu=array(
	//array('label'=>'List PropertyDetails', 'url'=>array('index')),
	array('label'=>'Create PropertyDetails', 'url'=>array('create')),
	array('label'=>'View PropertyDetails', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PropertyDetails', 'url'=>array('admin')),
);

?>
           
<h2>Update PropertyDetails</h2><h1 class="p_up"> <?php echo $model->propert_name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>          
 
