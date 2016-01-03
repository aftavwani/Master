<?php
/* @var $this SourceController */
/* @var $model Source */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'source-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="proper-lft">
		<div class="txt-log"><?php echo $form->labelEx($model,'s_tite'); ?></div>
		<div class="txt-box"><?php echo $form->textField($model,'s_tite',array('size'=>60,'maxlength'=>255)); ?></div>
		<?php echo $form->error($model,'s_tite'); ?>
	</div>

	<div class="proper-lft">
		<div class="txt-log"><?php echo $form->labelEx($model,'s_desc'); ?></div>
		<div class="txt-box"><?php echo $form->textArea($model,'s_desc',array('rows'=>6, 'cols'=>50)); ?></div>
		<?php echo $form->error($model,'s_desc'); ?>
	</div>

	<!--<div class="row">
		<?php echo $form->labelEx($model,'s_created'); ?>
		<?php echo $form->textField($model,'s_created'); ?>
		<?php echo $form->error($model,'s_created'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'s_modified'); ?>
		<?php echo $form->textField($model,'s_modified'); ?>
		<?php echo $form->error($model,'s_modified'); ?>
	</div>-->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'main-buts')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->