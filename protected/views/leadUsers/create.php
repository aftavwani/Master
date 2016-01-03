<?php
/* @var $this LeadUsersController */
/* @var $model LeadUsers */

$this->breadcrumbs=array(
	'Lead Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LeadUsers', 'url'=>array('index')),
	array('label'=>'Manage LeadUsers', 'url'=>array('admin')),
);
?>

<h1>Create LeadUsers</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>