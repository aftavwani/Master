<?php
/* @var $this SourceController */
/* @var $model Source */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'s_id'); ?>
		<?php echo $form->textField($model,'s_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'s_tite'); ?>
		<?php echo $form->textField($model,'s_tite',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'s_desc'); ?>
		<?php echo $form->textArea($model,'s_desc',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'s_created'); ?>
		<?php echo $form->textField($model,'s_created'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'s_modified'); ?>
		<?php echo $form->textField($model,'s_modified'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->