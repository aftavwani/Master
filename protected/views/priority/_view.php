<?php
/* @var $this PriorityController */
/* @var $data Priority */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->p_id), array('view', 'id'=>$data->p_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_title')); ?>:</b>
	<?php echo CHtml::encode($data->p_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_desc')); ?>:</b>
	<?php echo CHtml::encode($data->p_desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_status')); ?>:</b>
	<?php echo CHtml::encode($data->p_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_created')); ?>:</b>
	<?php echo CHtml::encode($data->p_created); ?>
	<br />


</div>