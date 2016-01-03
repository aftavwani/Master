<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>

   

  <div class="proper-lft">
       <div class="txt-log"><?php echo $form->label($model,'username'); ?></div>
       <div class="txt-box"><?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20)); ?></div>
    </div>

    <div class="proper-rgt">
        <div class="txt-log"><?php echo $form->label($model,'email'); ?></div>
        <div class="txt-box"><?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?></div>
    </div>


    <div class="row-right">
        <?php echo CHtml::submitButton(UserModule::t('Search'),array('class'=>'main-buts')); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->