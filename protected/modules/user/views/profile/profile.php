<div class="container">

<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
<div class="success">
	<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
</div>
<?php endif; ?>			

      
	<div class="profile-page">


				<div style="" class="left col-lg-6 col-md-6 col-sm-6 col-xs-12">
				

<h1 class="mid_hed"><?php echo UserModule::t('Your profile'); ?></h1>


<table class="dataGrid profile">
	
	<?php 
		$profileFields=ProfileField::model()->forOwner()->sort()->findAll();
		
		if ($profileFields) {
			foreach($profileFields as $field) {
				
			?>  
		
		<?php if($field->varname == 'profile_pic'){?>
			<tr>
				<th class="label">
				<?php if(isset($profile->profile_pic) && $profile->profile_pic != ''){?>
					<?php echo CHtml::encode(UserModule::t($field->title)); ?>
	  <?php 	      }?>
				</th>
				<td>
	  <?php
			  }else{?>
			<tr>
				<th class="label">
					<?php echo CHtml::encode(UserModule::t($field->title)); ?>
				</th>
				<td>
	   <?php  }?>
		
		<?php if($field->varname == 'profile_pic'){
			if(isset($profile->profile_pic) && $profile->profile_pic != ''){?>
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/'.$profile->profile_pic,"image",array("width"=>200));
			}?>
			</td>
	</tr>
		<?php }else{?>
		<?php echo (($field->widgetView($profile))?$field->widgetView($profile):CHtml::encode((($field->range)?Profile::range($field->range,$profile->getAttribute($field->varname)):$profile->getAttribute($field->varname)))); ?>
		</td>
	</tr>
		<?php }?>
			<?php
			}//$profile->getAttribute($field->varname)
		}
	?>
	
	<tr>
		<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('username')); ?></th>
	    <td><?php echo CHtml::encode($model->username); ?></td>
	</tr>
	<tr>
	
		<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('email')); ?></th>
    	<td><?php echo CHtml::encode($model->email); ?></td>
	</tr>
          
</table>


		

<?php /* $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");
$this->breadcrumbs=array(
	UserModule::t("Profile"),
);
 */
$this->menu=array(
	//((UserModule::isAdmin())
	//	?array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin'))
	//	:array()),
    //array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
    array('label'=>UserModule::t('Edit'), 'url'=>array('edit')),
    array('label'=>UserModule::t('Change password'), 'url'=>array('changepassword')),
    //array('label'=>UserModule::t('Logout'), 'url'=>array('/user/logout')),
);
?></div></div>
</div>