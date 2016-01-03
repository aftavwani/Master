<?php
/* @var $this SourceController */
/* @var $data Source */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('s_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->s_id), array('view', 'id'=>$data->s_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('s_tite')); ?>:</b>
	<?php echo CHtml::encode($data->s_tite); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('s_desc')); ?>:</b>
	<?php echo CHtml::encode($data->s_desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('s_created')); ?>:</b>
	<?php echo CHtml::encode($data->s_created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('s_modified')); ?>:</b>
	<?php echo CHtml::encode($data->s_modified); ?>
	<br />


</div>