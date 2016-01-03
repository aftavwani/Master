<?php
die;
/* @var $this ProperyDetailsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Propery Details',
);

$this->menu=array(
	array('label'=>'Create ProperyDetails', 'url'=>array('create')),
	array('label'=>'Manage ProperyDetails', 'url'=>array('admin')),
);
?>

<h1>Propery Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
