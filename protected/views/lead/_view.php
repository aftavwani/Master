<?php
/* @var $this LeadController */
/* @var $data Lead */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('enquiry_date')); ?>:</b>
	<?php echo CHtml::encode($data->enquiry_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('enquiry_source')); ?>:</b>
	<?php echo CHtml::encode($data->enquiry_source); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('enquiry_sub_source')); ?>:</b>
	<?php echo CHtml::encode($data->enquiry_sub_source); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('priority_source')); ?>:</b>
	<?php echo CHtml::encode($data->priority_source); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('priority_sub_source')); ?>:</b>
	<?php echo CHtml::encode($data->priority_sub_source); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('first_name')); ?>:</b>
	<?php echo CHtml::encode($data->first_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('middle_name')); ?>:</b>
	<?php echo CHtml::encode($data->middle_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_name')); ?>:</b>
	<?php echo CHtml::encode($data->last_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('country')); ?>:</b>
	<?php echo CHtml::encode($data->country); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state')); ?>:</b>
	<?php echo CHtml::encode($data->state); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city')); ?>:</b>
	<?php echo CHtml::encode($data->city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gender')); ?>:</b>
	<?php echo CHtml::encode($data->gender); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_1')); ?>:</b>
	<?php echo CHtml::encode($data->phone_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_2')); ?>:</b>
	<?php echo CHtml::encode($data->phone_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_3')); ?>:</b>
	<?php echo CHtml::encode($data->phone_3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_id')); ?>:</b>
	<?php echo CHtml::encode($data->email_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reminder_date')); ?>:</b>
	<?php echo CHtml::encode($data->reminder_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reminder_time')); ?>:</b>
	<?php echo CHtml::encode($data->reminder_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('message')); ?>:</b>
	<?php echo CHtml::encode($data->message); ?>
	<br />

	*/ ?>

</div>