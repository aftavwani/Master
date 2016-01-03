<?php

/* @var $this LeadController */
/* @var $model Lead */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="proper-lft">
		<div class="txt-log"><?php echo $form->labelEx($model,'enquiry_source'); ?></div>
		<div class="txt-box"><?php echo $form->dropDownList($model,'enquiry_source', CHtml::listData(Source::model()->findAll(), 's_tite', 's_tite'), array('empty'=>'--Select Source--'));  ?> 
		<?php //echo $form->error($model,'enquiry_source'); ?></div>
	</div>                                                                                                  
   <div class="proper-rgt">                 
	 <div class="txt-log"><?php echo $form->labelEx($model,'priority_source'); ?></div>
		<div class="txt-box"><?php echo $form->dropDownList($model,'priority_source', CHtml::listData(Priority::model()->findAll(), 'p_title', 'p_title'), array('empty'=>'--Select Priority--'));  ?> </div>
		
		<?php //echo $form->error($model,'priority_source'); ?>
	</div> 
	
	<div class="proper-lft">
		<div class="txt-log"><?php echo $form->label($model,'retail_broker'); ?></div>
		<div class="txt-box"><?php echo $form->dropDownList($model,'retail_broker',array(''=>'Choose One','retailer'=>'Retailer','broker'=>'Broker')); ?></div>
		
	</div>
	
	<div class="proper-rgt">
		<div class="txt-log"><?php echo $form->label($model,'min_size'); ?></div>
		<div class="txt-box"><?php echo $form->textField($model,'min_size',array('size'=>60,'maxlength'=>255)); ?></div>
	
	</div>	
	<div class="proper-lft">
		<div class="txt-log"><?php echo $form->label($model,'max_size'); ?></div>
		<div class="txt-box"><?php echo $form->textField($model,'max_size',array('size'=>60,'maxlength'=>255)); ?></div>
	
	</div>

	<div class="proper-rgt">
		<div class="txt-log"><?php echo $form->label($model,'enquiry_sub_source'); ?></div>
		<div class="txt-box"><?php echo $form->textField($model,'enquiry_sub_source',array('size'=>60,'maxlength'=>255)); ?></div>
	</div>

	
	<div class="proper-lft">
		<div class="txt-log"><?php echo $form->label($model,'priority_sub_source'); ?></div>
		<div class="txt-box"><?php echo $form->textField($model,'priority_sub_source',array('size'=>60,'maxlength'=>255)); ?></div>
	</div>

	              
	<div class="proper-rgt">
		<div class="txt-log"><?php echo $form->label($model,'phone_1'); ?></div>
		<div class="txt-box"><?php echo $form->textField($model,'phone_1'); ?></div>
	</div>
	
	<div class="proper-lft">
		 <div class="txt-log"><?php echo $form->labelEx($model,'retail'); ?></div>
		<div class="txt-box"><?php echo $form->textField($model,'retail',array('size'=>60,'maxlength'=>255)); ?></div>
		<?php //echo $form->error($model,'first_name'); ?>
	</div>	
	
		    
	<div class="row-right">
		<?php echo CHtml::submitButton('Search',array('class'=>'main-but')); ?>
		<?php echo CHtml::resetButton('Clear',array('class'=>'main-but')); ?>
	</div>                                           
	                               

<?php $this->endWidget(); ?>

</div><!-- search-form -->