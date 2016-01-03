<?php
/* @var $this PriorityController */
/* @var $model Priority */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'priority-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php echo $form->errorSummary($model); ?>
	
	<div class="proper-lft">
	<?php
    $list = CHtml::listData($model::model()->findAllByattributes(array('p_parent'=>0,'p_status'=>1)), 'p_id', 'p_title');?>
	  <div class="txt-log"><?php echo $form->labelEx($model,'p_parent'); ?></div>
	 <div class="txt-box"><?php echo $form->dropDownList($model, 'p_parent',  $list, array('empty' => '-Parent Priority-'));  ?></div>
	<?php echo $form->error($model,'p_parent'); ?>
	
	</div>


	<div class="proper-lft">
		<div class="txt-log"><?php echo $form->labelEx($model,'p_title'); ?></div>
		<div class="txt-box"><?php echo $form->textField($model,'p_title',array('size'=>60,'maxlength'=>255)); ?></div>
		<?php echo $form->error($model,'p_title'); ?>
	</div>

	

	<div class="proper-lft">
		<div class="txt-log"><?php echo $form->labelEx($model,'p_desc'); ?></div>
		<div class="txt-box"><?php echo $form->textArea($model,'p_desc',array('rows'=>6, 'cols'=>50)); ?></div>
		<?php echo $form->error($model,'p_desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'p_status'); ?>
		
		<?php 
		
		echo $form->checkBox($model, 'p_status', array('value'=>'1', 'uncheckValue'=>'0')); ?>
		<?php echo $form->error($model,'p_status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'main-buts')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->


