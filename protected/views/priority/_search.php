<?php
/* @var $this PriorityController */
/* @var $model Priority */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'p_id'); ?>
		<?php echo $form->textField($model,'p_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_title'); ?>
		<?php echo $form->textField($model,'p_title',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_desc'); ?>
		<?php echo $form->textArea($model,'p_desc',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_status'); ?>
		<?php echo $form->textField($model,'p_status',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_created'); ?>
		<?php echo $form->textField($model,'p_created'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->