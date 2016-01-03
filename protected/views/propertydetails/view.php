<?php
/* @var $this ProperyDetailsController */
/* @var $model ProperyDetails */

$this->breadcrumbs=array(
	'Propery Details'=>array('index'),
	$model->id,
);

$this->menu=array(
	//array('label'=>'List ProperyDetails', 'url'=>array('index')),
	array('label'=>'Create ProperyDetails', 'url'=>array('create')),
	array('label'=>'Update ProperyDetails', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProperyDetails', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProperyDetails', 'url'=>array('admin')),
);
?>

<h2>View ProperyDetails</h2> <h1 class="p_up"><?php echo $model->propert_name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(	
		'status',
		'propert_name',
		'price',	
		'property_type',
		'nnn_charges',
		'owner_first_name',
		'owner_last_name',
		'owner_phone',
		'owner_cell_no',
		'owner_email_id',
		'street_address',
		'unit',
		
		'state',
		'city',
		
	),
)); ?>
