<?php
/* @var $this LeadController */
/* @var $model Lead */

/* $this->breadcrumbs=array(
	'Leads'=>array('index'),
	$model->id,
); */
$id = Yii::app()->user->id;  
$command = Yii::app()->db->createCommand('SELECT * FROM tbl_users where id='.$id);
$data = $command->queryAll();
if($data[0]['superuser']==1 || $data[0]['superuser']==2){
$this->menu=array(
	//array('label'=>'List Lead', 'url'=>array('index')),
	array('label'=>'Create Lead', 'url'=>array('create')),
	array('label'=>'Update Lead', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Lead', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Lead', 'url'=>array('admin')),
);
}
else { }
?>

<h1>View Lead <?php echo $model->organisation_name; ?></h1>


<?php if($model->repersented_by_broker == 'N' || $model->repersented_by_broker == ""){
 $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'retail',
		'retail',
		'uses',
		'retailer_webiste',
		'title',
		'high_end',
		'message',
		'first_name',
		'last_name',
		'country',
		'state',
		'city',
		'address',
		'phone_1',
		'phone_2',
		'email_id',
		'reminder_date',
		'message',
		'min_size',
		'max_size',
		'repersented_by_broker',
		),
)); 
}
else 
{
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'retail',
		'uses',
		'retailer_webiste',
		'title',
		'high_end',
		'message',
		'first_name',
		'last_name',
		'country',
		'state',
		'city',
		'address',
		'phone_1',
		'phone_2',
		'email_id',
		'reminder_date',
		'message',
		'min_size',
		'max_size',
		'retail_broker',
		'repersented_by_broker',
		'broker_company',
		'broker_firstname',
		'broker_lastname',
		'broker_territory',
		'broker_phone_no',
		'broker_cell_no',
		'broker_email',
	),
)); 
}
?>

<?php  	
	$command = Yii::app()->db->createCommand("SELECT * FROM `tbl_lead_fields` WHERE id=".$model->id);
	$data = $command->queryAll();
	$commands = Yii::app()->db->createCommand("SELECT * FROM `tbl_users` WHERE id=".$data[0]['user_id']);
	$res = $commands->queryAll();
	$actti = Yii::app()->db->createCommand("SELECT * FROM `tbl_reminders` WHERE lead_id=".$model->id);
	$act = $actti->queryAll(); 
	
	?>	
	
	 <div class="footer">
	 <h2>Activity<h2/>	
	<?php if(!empty($act)){ 
	 foreach ($act as $activ) { 
	$actti = Yii::app()->db->createCommand("SELECT * FROM `tbl_users` WHERE id=".$activ['user_id']);
	$act_ti = $actti->queryAll();  ?>
	<span><?php echo strtoupper($act_ti[0]['username']).' '."</span>: Updated a lead on  ".$activ['date'].'<span> And write a message</span>'.'  '.$activ['msg'];?></br>
	<span><?php echo strtoupper($act_ti[0]['username']).' '."</span>: Updated a lead on  ".$act[0]['date'].' And write a message'.'  <span>'.$act[0]['msg'].'</span>  And Changed The Status<span>'; ?>
	
	<?php if ($act[0]['status'] == 2 ){
		echo "Interested";	}
		elseif ($act[0]['status'] == 3 ) { echo "Awaiting Feedback"; }
		elseif ($act[0]['status'] == 4 ) { echo "Not Interested"; }
		else { echo "AT LEASE/SIGNED";}
		?></br></span>
	
	<?php } } ?>

	<?php 
	$lmn = Yii::app()->db->createCommand("SELECT * FROM `tbl_property_lead_user` WHERE leads_id=".$model->id);
	$mn = $lmn->queryAll();
	if($mn) {	
	foreach ($mn as $m) { 
	$users = Yii::app()->db->createCommand("SELECT * FROM `tbl_users` WHERE id=".$m['user_id']);
	$use = $users->queryAll(); ?>
		<span><?php echo strtoupper($use[0]['username']).' '."</span>: Updated a lead<span> And write a message</span>"; ?>
			<?php if($m['other'] == '0') { echo ""; }  else { echo $m['other']; } ?>
			<?php if($m['check_1'] == '0') { echo ""; }  else { echo '</br>'.$m['check_1']; }  ?>
			<?php if($m['check_2'] == '0') { echo ""; }  else { echo '</br>'.$m['check_2']; } ?>
			<?php if($m['check_3'] == '0') { echo ""; }  else { echo '</br>'.$m['check_3']; } ?>
			<?php if($m['check_4'] == '0') { echo ""; }  else { echo '</br>'.$m['check_4']; } ?>
			<?php if($m['check_6'] == '0') { echo ""; }  else { echo '</br>'.$m['check_6']; } ?>
		
			
			
	 
<?php }	}
	?>
	
		</div>
