<?php
/* @var $this RemindersController */
/* @var $model Reminders */

/* $this->breadcrumbs=array(
	'Reminders'=>array('index'),
	'Manage',
); */

$this->menu=array(
	//array('label'=>'List Reminders', 'url'=>array('index')),
	//array('label'=>'Create Reminders', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#reminders-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:block">
<?php $this->renderPartial('_search',array('model'=>$model,)); ?>
</div><!-- search-form -->
<?php if(isset($model->time) or $model->date){ 
 $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'reminders-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'lead_id',
		'date',
		'time',
		 
		array(
			'class'=>'CButtonColumn',
		),
	),
));}
else { }  ?>
<h1 class="mid_hed">MISSED</h1>
  <?php
 $cur_date= date('m/d/Y');
/*  $comma = Yii::app()->db->createCommand('SELECT tbl_lead_fields.retail,tbl_lead_fields.id,tbl_lead_fields.id, tbl_reminders.msg ,tbl_reminders.date ,tbl_lead_fields.email_id,tbl_reminders.time,	tbl_lead_fields.first_name,tbl_lead_fields.phone_1 FROM
		tbl_lead_fields JOIN 
		tbl_reminders ON tbl_lead_fields.id = tbl_reminders.lead_id and tbl_reminders.date < "'.$cur_date.'" ORDER BY date Desc LIMIT 10'); */	

 $comma = Yii::app()->db->createCommand('SELECT 
		a.retail, 
		a.id as leadid,
		a.email_id,
		a.first_name,
		a.phone_1,
		b.msg,
        b.date,
        b.time,
        c.propert_name,
        c.id
FROM    tbl_lead_fields a
        INNER JOIN tbl_reminders b
            ON a.id = b.lead_id
        INNER JOIN tbl_propery_details c
            ON b.pro_id = c.id
WHERE   b.date < "'.$cur_date.'" ORDER BY date Desc LIMIT 20');		

 $misss = $comma->queryAll(); ?>
 
 <?php /*  echo "<pre>"; print_r($misss); die('ok');  */ ?>
  <?php  if($misss){ ?>
<table class="today">
<tr>
<th>Sno</th><th>Property Name</th><th>Name</th><th>Phone Number</th><th>Email</th><th>Reminder Date & Time</th><th>Last Message</th><th>Action</th></tr>
 <?php $i=1;
  foreach($misss as $miss){ 
 ?>

<tr><td><a href="<?php echo Yii::app()->baseurl;?>/index.php/lead/<?php echo $miss['id']; ?>"><?php echo $i++; ?></a></td>
<td><a href="<?php echo Yii::app()->baseurl;?>/lead/admin/?id=<?php echo $miss['id']; ?>"><?php echo strtoupper($miss['propert_name']); ?></a></td>
<td><?php echo strtoupper($miss['retail']);  ?></td>


<td><?php echo $miss['phone_1'];  ?></td><td><?php echo $miss['email_id'];  ?></td><td><?php echo $miss['date'].' '.$miss['time']; ?></td><td><?php echo $miss['msg'];  ?></td>
<td><a href ="<?php echo Yii::app()->baseurl;?>/index.php/reminders/admin?action=delete&id=<?php echo $miss['leadid']; ?>"><img class="del" src ="<?php echo  Yii::app()->baseurl;?>/images/del.png"></a></td>
</tr>
 <?php }  ?> 
</table>
<?php } else{ echo "<h1 class='rem'>!No Reminder Found</h1>"; }?>
<?php if (isset($_GET['action']) == 'delete'){
		
	$result = Yii::app()->db->createCommand("Delete from tbl_reminders  where lead_id =".$_GET['id'])->execute();
		if($result) {
			echo '<script type="text/javascript">'; 
			
			echo 'location.reload();';
			echo '</script>';	}
}   ?>

 <h1 class="mid_hed">TODAY</h1>
 
 <?php  if($today){ ?>
<table class="today">
<tr>
<th>Sno</th><th>Property Name</th><th>Name</th><th>Phone Number</th><th>Email</th><th>Reminder Date & Time</th><th>Last Message</th><th>Action</th></tr>
 <?php $i=1;
 foreach($today as $todo){ ?>
 <tr>
 <td><a href="<?php echo Yii::app()->baseurl;?>/index.php/lead/<?php echo $todo['id']; ?>"><?php echo $i++; ?></a></td>
 
<td><a href="<?php echo Yii::app()->baseurl;?>/lead/admin/?id=<?php echo $todo['id']; ?>"><?php echo strtoupper($todo['propert_name']); ?></a></td>


<td><?php echo strtoupper($todo['retail']);  ?> </td><td><?php echo $todo['phone_1'];  ?></td><td><?php echo $todo['email_id'];  ?></td><td><?php echo $todo['date'].' '.$todo['time']  ?></td><td><?php echo $todo['msg'];  ?></td>
 <td><a href ="<?php echo Yii::app()->baseurl;?>/index.php/reminders/admin?action=delete&id=<?php echo $todo['leadid']; ?>"><img class="del" src ="<?php echo  Yii::app()->baseurl;?>/images/del.png"></a></td>
 </tr>
 <?php }  ?> 
</table>
<?php } else{ echo "<h1 class='rem'>!No Reminder Found</h1>"; }?>


 <h1 class="mid_hed">UPCOMMINGS</h1>

 <?php
 $cur_date= date('m/d/Y');
  $comma = Yii::app()->db->createCommand('SELECT 
		a.retail, 
		a.id as leadid,
		c.id,
		a.email_id,
		a.first_name,
		a.phone_1,
		b.msg,
        b.date,
        b.time,
        c.propert_name
FROM    tbl_lead_fields a
        INNER JOIN tbl_reminders b
            ON a.id = b.lead_id
        INNER JOIN tbl_propery_details c
            ON b.pro_id = c.id
WHERE   b.date > "'.$cur_date.'" ORDER BY date ASC LIMIT 20');	

 		
		$data = $comma->queryAll();?>
	
 
  <?php  if($data){ ?>
<table class="today">
<tr>
<th>Sno</th><th>Property Name</th><th>Name</th><th>Phone Number</th><th>Email</th><th>Reminder Date & Time</th><th>Last Message</th><th>Action</th></tr>
 <?php $i=1;
 foreach($data as $datas){ ?>
<tr><td><a href="<?php echo Yii::app()->baseurl;?>/index.php/lead/<?php echo $datas['id']; ?>"><?php echo $i++; ?></a></td>

<td><a href="<?php echo Yii::app()->baseurl;?>/lead/admin/?id=<?php echo  $datas['id']; ?>"><?php echo $datas['propert_name']; ?></a> </td>


<td><?php echo strtoupper($datas['retail']);  ?> </td><td><?php echo $datas['phone_1'];  ?></td><td><?php echo $datas['email_id'];  ?></td><td><?php echo $datas['date'].' '.$datas['time']; ?></td><td><?php echo $datas['msg'];  ?></td>
<td><a href ="<?php echo Yii::app()->baseurl;?>/index.php/reminders/admin?action=delete&id=<?php echo $datas['leadid']; ?>"><img class="del" src ="<?php echo  Yii::app()->baseurl;?>/images/del.png"></a></td>
</tr>
 <?php }  ?> 
</table>
<?php } else{ echo "<h1 class='rem'>!No Reminder Found</h1>"; }?>

 



