<?php
/* @var $this LeadUsersController */
/* @var $model LeadUsers */

$this->breadcrumbs=array(
	'Lead Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List LeadUsers', 'url'=>array('index')),
	array('label'=>'Create LeadUsers', 'url'=>array('create')),
	array('label'=>'View LeadUsers', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage LeadUsers', 'url'=>array('admin')),
);
?>

<h1>Update LeadUsers <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>