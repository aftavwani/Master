<?php
/* @var $this ProperyDetailsController */
/* @var $model ProperyDetails */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="proper-lft">
		<div class="txt-log"> <?php echo $form->label($model,'status'); ?></div>
		<div class="txt-box"><?php echo $form->dropDownList($model,'status', array('ForSale'=>'For Sale','ForLease'=>'For Lease'), array('empty'=>'--Select Status--', 'class'=>'status_fld')); ?></div>
    </div>

	
    <div class="proper-rgt">
		 <div class="txt-log"> <?php echo $form->label($model,'price'); ?></div>
		 <div class="txt-box"><?php echo $form->textField($model,'price',array('size'=>60,'maxlength'=>255)); ?></div>
    </div>

	 <div class="proper-lft">
		<div class="txt-log"> <?php echo $form->labelEx($model,'property_type'); ?></div>
		<div class="txt-box"><?php echo $form->dropDownList($model,'property_type',array(''=>'Select Property','VacantLand '=>'Vacant Land','ResidentialProperties'=>'Residential Properties','CommercialProperties'=>'Commercial Properties')); ?></div>
    </div>
	
	<div class="proper-rgt">
		<div class="txt-log"><?php echo $form->labelEx($model,'owner_first_name'); ?></div>
		<div class="txt-box"><?php echo $form->textField($model,'owner_first_name',array('size'=>60,'maxlength'=>255)); ?></div>
		<?php //echo $form->error($model,'state'); ?>
	</div>
	
	<div class="proper-lft">
		<div class="txt-log"><?php echo $form->labelEx($model,'owner_last_name'); ?></div>
		<div class="txt-box"><?php echo $form->textField($model,'owner_last_name',array('size'=>60,'maxlength'=>255)); ?></div>
		<?php //echo $form->error($model,'state'); ?>
	</div>

	
	

	<div class="row-right">
		<?php echo CHtml::submitButton('Search',array('class'=>'main-but')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->