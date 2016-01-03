<?php
/* @var $this RemindersController */
/* @var $model Reminders */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<!---<div class="proper-lft">
		<div class="txt-log"><?php echo $form->label($model,'id'); ?></div>
		<div class="txt-box"><?php echo $form->textField($model,'id'); ?></div>
	</div>

	  <div class="proper-rgt">
		<div class="txt-log"><?php echo $form->label($model,'lead_id'); ?></div>
			<div class="txt-box"><?php echo $form->textField($model,'lead_id'); ?></div>
	</div>---->

	<div class="proper-lft">
		<div class="txt-log"><?php echo $form->label($model,'date'); ?></div>
			<div class="txt-box"><?php echo $form->textField($model,'date'); ?></div>
	</div>

	  <div class="proper-rgt">
		<div class="txt-log"><?php echo $form->label($model,'time'); ?></div>
			<div class="txt-box"><?php echo $form->textField($model,'time'); ?>
	</div></div>

	

	<div class="row-right">
		<?php echo CHtml::submitButton('Search',array('class'=>'main-but')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->