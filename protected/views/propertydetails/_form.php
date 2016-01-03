<?php $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$abc = explode ('/',$actual_link);


?>


<?php
/* @var $this ProperyDetailsController */
/* @var $model ProperyDetails */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'propery-details-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	 'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<div class="pro_image">
<?php if(isset($abc[6])){ 
$_abc = PropertyDetails::Model()->findAllByAttributes(array('id'=>$abc[6])); ?>
<Img src = "<?php echo Yii::app()->baseurl;?>/uploads/img/<?php echo $_abc[0]['image']; ?>">

<?php } ?>
</div>


	<?php echo $form->errorSummary($model); ?>
    
    <div class="proper-lft">
    <div class="txt-log"><?php echo $form->labelEx($model,'image'); ?></div>
    <div class="txt-box"><?php echo $form->fileField($model,'image'); ?></div>
    </div>
	
    <div class="proper-rgt">
    <div class="txt-log"><?php echo $form->labelEx($model,'property_owner'); ?></div>
	<div class="txt-box"><?php echo $form->dropDownList($model,'property_owner', CHtml::listData(User::model()->findAllByAttributes(array('superuser'=>4)), 'id', 'username'), array('empty'=>'--Select Owner--'));  ?> </div>
    </div>
    
                                                         
    
    <div class="proper-lft">
   <div class="txt-log"> <?php echo $form->labelEx($model,'status'); ?></div>
    <div class="txt-box"><?php echo $form->dropDownList($model,'status', array('ForSale'=>'For Sale','ForLease'=>'For Lease'), array('empty'=>'--Select Status--', 'class'=>'status_fld')); ?></div>
    </div>
    
      
    <div class="proper-rgt">
   <div class="txt-log"> <?php echo $form->labelEx($model,'propert_name'); ?></div>
		 <div class="txt-box"><?php echo $form->textField($model,'propert_name',array('size'=>60,'maxlength'=>255)); ?></div>
    </div>
    
    
    
    <div class="proper-lft">
   <div class="txt-log"> <?php echo $form->labelEx($model,'price'); ?></div>
		 <div class="txt-box"><?php echo $form->textField($model,'price',array('size'=>60,'maxlength'=>255)); ?></div>
    </div>
    
    <div class="proper-rgt">
  <div class="txt-log">  <?php echo $form->labelEx($model,'nnn_charges'); ?></div>
		<div class="txt-box"><?php echo $form->textField($model,'nnn_charges',array('size'=>60,'maxlength'=>255)); ?></div>
    </div>
    
      <div class="proper-lft">
  <div class="txt-log"><?php echo $form->labelEx($model,'unit'); ?></div>
		<div class="txt-box"><?php echo $form->textField($model,'unit[]',array('size'=>60,'maxlength'=>255, 'id'=>'')); ?></div>
    </div>
    
    <div class="proper-rft">
	<div class="txt-log"> <?php echo $form->labelEx($model,'property_type'); ?></div>
		<div class="txt-box"><?php echo $form->dropDownList($model,'property_type',array(''=>'Select Property','VacantLand '=>'Vacant Land','ResidentialProperties'=>'Residential Properties','CommercialProperties'=>'Commercial Properties')); ?></div>
    </div>
    
    
   
    
    
    
    <div class="proper-lfts hide">
  <div class="txt-log"><?php echo $form->labelEx($model,'unit 2'); ?></div>
		<div class="txt-box">	<?php echo $form->textField($model,'unit[]',array('size'=>60,'maxlength'=>255, 'id'=>'')); ?></div>
    </div>
    
    
    
      <div class="proper-lfts hide">
	<div class="txt-log">	<?php echo $form->labelEx($model,'unit 3'); ?></div>
		<div class="txt-box"><?php echo $form->textField($model,'unit[]',array('size'=>60,'maxlength'=>255, 'id'=>'')); ?></div>
    </div>
    
    
    
    <div class="proper-lft">
  <div class="txt-log"><?php echo $form->labelEx($model,'street_address'); ?></div>
		<div class="txt-box"><?php echo $form->textField($model,'street_address',array('size'=>60,'maxlength'=>255)); ?></div>
    </div>
    
    
      <div class="proper-rgt">
  <div class="txt-log"><?php echo $form->labelEx($model,'city'); ?></div>
		<div class="txt-box">	<?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>255)); ?></div>
    </div>
    
    
    	
	 <div class="proper-lft">
   <div class="txt-log"> <?php echo $form->labelEx($model,'state'); ?></div>
    <div class="txt-box"><?php echo $form->dropDownList($model,'state', array(
	'Alaska'=>'Alaska',
	'Alabama'=>'Alabama',
	'Arizona'=>'Arizona',
	'Armed Forces US'=>'Armed Forces US',
	'California'=>'California',
	'Connecticut'=>'Connecticut',
	'District of Columbia'=>'District of Columbia',
	'Delaware'=>'Delaware',
	'Florida'=>'Florida',
	'Georgia'=>'Georgia',
	'Hawaii'=>'Hawaii',
	'Iowa'=>'Iowa',
	'Indiana'=>'Indiana',
	'Idaho'=>'Idaho',
	'Illinois'=>'Illinois',
	'Kentucky'=>'Kentucky',	
	'Kansas'=>'Kansas',
	'Louisiana'=>'Louisiana',
	'Minnesota'=>'Minnesota',	
	'Massachusetts'=>'Massachusetts',
	'Montana'=>'Montana',
	'Missouri'=>'Missouri',
	'Mississippi'=>'Mississippi',
	'Maine'=>'Maine',	
	'New York'=>'New York',
	'New Jersey'=>'New Jersey',
	'New Mexico'=>'New Mexico',
	'Nevada'=>'Nevada',
	'New Hampshire'=>'New Hampshire',	
	'North Dakota'=>'North Dakota',	
	'Nebraska'=>'Nebraska',
	'Ohio'=>'Ohio',	
	'Oregon'=>'Oregon',
	'Oklahoma'=>'Oklahoma',		
	'Texas'=>'Texas',
	'Tennessee'=>'Tennessee',	
	'Colorado'=>'Colorado',
	'Utah'=>'Utah','Maryland'=>'Maryland',
	'South Carolina'=>'South Carolina',
	'Rhode Island'=>'Rhode Island',	
	'South Dakota'=>'South Dakota',
	'Virginia'=>'Virginia',	
	'Vermont'=>'Vermont', 
	'Washington'=>'Washington',	
	'Wyoming'=>'Wyoming',	
	'West Virginia'=>'West Virginia'),	
	array('empty'=>'--Select State--', 'class'=>'status_fld')); ?></div>
    </div>
	
	<hr/>
	<h1 class="mid_hed">Owner Information:-</h1>
	<hr/>
	<!--<div class="proper-lft">
		<div class="txt-log"><?php echo $form->labelEx($model,'owner'); ?></div>
		<div class="txt-box"><?php echo $form->textField($model,'owner',array('size'=>60,'maxlength'=>255)); ?></div>
		<?php //echo $form->error($model,'state'); ?>
	</div>-->
	
	<div class="proper-lft">
		<div class="txt-log"><?php echo $form->labelEx($model,'owner_first_name'); ?></div>
		<div class="txt-box"><?php echo $form->textField($model,'owner_first_name',array('size'=>60,'maxlength'=>255)); ?></div>
		<?php //echo $form->error($model,'state'); ?>
	</div>
	
	<div class="proper-rgt">
		<div class="txt-log"><?php echo $form->labelEx($model,'owner_last_name'); ?></div>
		<div class="txt-box"><?php echo $form->textField($model,'owner_last_name',array('size'=>60,'maxlength'=>255)); ?></div>
		<?php //echo $form->error($model,'state'); ?>
	</div>
	
	<div class="proper-lft">
		<div class="txt-log"><?php echo $form->labelEx($model,'owner_phone'); ?></div>
		<div class="txt-box"><?php echo $form->textField($model,'owner_phone',array('size'=>60,'maxlength'=>255)); ?></div>
		<?php //echo $form->error($model,'state'); ?>
	</div>
	
	<div class="proper-rgt">
		<div class="txt-log"><?php echo $form->labelEx($model,'owner_cell_no'); ?></div>
		<div class="txt-box"><?php echo $form->textField($model,'owner_cell_no',array('size'=>60,'maxlength'=>255)); ?></div>
		<?php //echo $form->error($model,'state'); ?>
	</div>
	<div class="proper-rgt">
		<div class="txt-log"><?php echo $form->labelEx($model,'owner_email_id'); ?></div>
		<div class="txt-box"><?php echo $form->textField($model,'owner_email_id',array('size'=>60,'maxlength'=>255)); ?></div>
		<?php //echo $form->error($model,'state'); ?>
	</div>
	
	
	<h1 class="mid_hed">Assign Property To Staff</h1>
	 
	
	<?php
	$my_users = Yii::app()->db->createCommand('SELECT * FROM tbl_users where superuser <> 4');
	$sts = $my_users->queryAll(); 
	?>
	
   	<?php foreach ($sts as $aus) { ?>
	<ul class="mmyta">
	<li class="mba"><?php echo  $aus['username']; ?></li>
	<li class="mba"><input value = "<?php echo $aus['id'];?>" type="checkbox" name ="assign_user[]"> </ul> <?php } ?> </li>
	
	
	

		<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'main-buts')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->