<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>true,
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
));
?>

	<?php //echo $form->errorSummary(array($model,$profile)); ?>

   <div class="proper-lft">
		 <div class="txt-log"><?php echo $form->labelEx($model,'username'); ?></div>
		 <div class="txt-box"><?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20)); ?></div>
	<div class="row"><?php echo $form->error($model,'username'); ?></div>
	</div>

	<div class="proper-rgt">
		 <div class="txt-log"><?php echo $form->labelEx($model,'password'); ?></div>
		<div class="txt-box"><?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>128)); ?></div>
		<?php //echo $form->error($model,'password'); ?>
	</div>
	
	  <div class="proper-lft">
		 <div class="txt-log"><?php echo $form->labelEx($model,'email'); ?></div>
		 <div class="txt-box"><?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?></div>
		<?php //echo $form->error($model,'username'); ?>
	</div>
	
	<div class="proper-rgt">
		 <div class="txt-log"><?php echo $form->labelEx($model,'superuser'); ?></div>
		 <div class="txt-box"><?php echo $form->dropDownList($model,'superuser',User::itemAlias('AdminStatus')); ?></div>
		<?php //echo $form->error($model,'superuser'); ?>
	</div>
	
	
	  <div class="proper-lft">
		 <div class="txt-log"><?php echo $form->labelEx($model,'status'); ?></div>
		 <div class="txt-box"><?php echo $form->dropDownList($model,'status',User::itemAlias('UserStatus')); ?></div>
		<?php //echo $form->error($model,'status'); ?>
	</div>
<?php 
		$profileFields=$profile->getFields();
		if ($profileFields) {
			foreach($profileFields as $field) {
			?>
	<div class="proper-lft">
		 <div class="txt-log"><?php echo $form->labelEx($profile,$field->varname); ?></div>
		<div class="txt-box"><?php 
		if ($widgetEdit = $field->widgetEdit($profile)) {
			echo $widgetEdit;
		} elseif ($field->range) {
			echo $form->dropDownList($profile,$field->varname,Profile::range($field->range));
		} elseif ($field->field_type=="TEXT") {
			echo CHtml::activeTextArea($profile,$field->varname,array('rows'=>6, 'cols'=>50));
		} else {
			echo $form->textField($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
		}
		 ?>
		<?php echo $form->error($profile,$field->varname); ?>
	</div>
	</div>
			<?php
			}
		}
?>  
	<div class="row">
		<?php echo CHtml::submitButton($model->isNewRecord ? UserModule::t('Create') : UserModule::t('Save'),array('class'=>'main-buts')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->