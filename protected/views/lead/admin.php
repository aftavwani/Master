<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
	/* $('#non').droppable({
	   drop : function(ev, ui) {
		var wa = ($('#non').attr('title'));
		alert(wa);
		}
	}); */
	
	$('.box-min .draggable-list').sortable({
	connectWith: '.box-min .draggable-list',
	/* update: function(event, ui) {	
	
		//$('.show_popup').click();
			} */
	});
	$(".drag_box").droppable({
        drop : function(ev, ui) {
            var lid = ui.draggable.children('li').attr('title');
            var dname= $(this).find('.draggable-list').attr('id');
			
			var pro_my_id = $('input[name="pro_ids"]').val();
			
			if (pro_my_id == "" ){
			alert("Please Select Property First");
			location.reload();
			return false;}
		else{	
		if(dname == 'fourth') {
				$('.my_popup').click();
			
			} 
			 else if (dname == 'fifth'){
			 var msg = 0;
			 var rem = 0;
			 var messages = 0;
			 $.ajax({
							
								type: "POST",
								url: "ajax",
								data: {sort_order:lid,pesrson_n:msg,remindre:rem,boxid:dname,message:messages},
								success: "success",
								dataType: "dataType"
						});	
			}
			else {
				$('.show_popup').click();
			}
			 
					$("#submit").click(function () {
					
						var msg = $( "#msg" ).val();
					var rem = $('input[name="rem"]').val();
					
					var messages = $('textarea#message').val();
							$.ajax({
							
								type: "POST",
								url: "ajax",
								data: {sort_order:lid,pesrson_n:msg,remindre:rem,boxid:dname,message:messages},
								success: "success",
								dataType: "dataType"
						});	
						alert('Sucessfully Changed');
						
				}); 
				$("#save").click(function () {
					
					var msg = $( "#other" ).val();
					var rem = $('input[name="rem"]').val();
					
					var notsd = $("input[name='not']:checked");
					var not = $(notsd).val();
					
					var notsds = $("input[name='notins']:checked");
					var notin = $(notsds).val();
					
					var not1 = $("input[name='wrong']:checked");
					var wrong = $(not1).val();
					
				
					var not2 = $("input[name='too']:checked");
					var too = $(not2).val();
					
					var not5 = $("input[name='eco']:checked");
					var tooxx = $(not5).val();
					
					
					var xx = $("input[name='likey']:checked");
					var xxx = $(xx).val();
					
					var aa = $("input[name='liken']:checked");
					var aaa = $(aa).val();
					
					var messages = $('textarea#message').val();
					
							$.ajax({							
								type: "POST",
								url: "ajax",
								data: {sort_order:lid,abc:not,abc1:notin, abc2:wrong,abc3:too,pesrson_n:msg,remindre:rem,boxid:dname,message:messages,xy:xxx,ab:aaa,wani:tooxx},
								success: "success",
								dataType: "dataType"
						});	
						alert('Sucessfuly changed');
						
						
						
				}); 
				}
	      }
    });
});
</script>

<?php if(isset($myVar)){
$myVar = 1;

}
else { $myVar = Yii::app()->SESSION['p_id']; } 
 ?>
<input type="hidden" name="pro_ids" id="pro_ids" value="<?php echo $myVar;?>">

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script type="text/javascript" src="<?php echo Yii::app()->baseurl; ?>/js/jquery.timepicker.js"></script>
 <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseurl; ?>/js/jquery.timepicker.css" />
                                     
<script>
$(function() {
$( "#datepicker" ).datepicker();
$('#basicExample').timepicker({ 'timeFormat': 'h:i A' });
});
</script>
	<p><a id="form_id" class='inline hide show_popup' href="#inline_content">form </a></p>
		<!-- This contains the hidden content for inline calls -->
		<div id="form_box" class="hide">
			<div id='inline_content' style='padding:10px; background:#fff;'>
				<form method="POST" name="validaet_form"></td>
						<table>		
						<tr><td></td><td>SET REMINDER</td></tr>						
						<tr><td>Reminder Date*</td><td><input type="text" id="datepicker" name="rem" required></td></tr>
						<tr><td>Time*</td><td>
						<select id = "msg" name="msg">
						<option value="8:00AM">8:00 AM</option>
						<option value="8:00AM">9:00 AM</option>
						<option value="8:00AM">10:00 AM</option>
						<option value="8:00AM">11:00 AM</option>
						<option value="8:00AM">12:00 PM</option>
						<option value="8:00AM">1:00 PM</option>
						<option value="8:00AM">2:00 PM</option>
						<option value="8:00AM">3:00 PM</option>
						<option value="8:00AM">4:00 PM</option>
						<option value="8:00AM">5:00 PM</option>
						<option value="8:00AM">6:00 PM</option>					
						</select></td></tr>
						<tr><td>Message*</td><td><textarea required id ="message" name="message"></textarea> </td></tr>
						<tr><td></td><td><input type="submit" class="main-buts" id= "submit" name="save" value="save"></td></tr>
					</table>
				</form>				        
				<button class ="main-can" type="cancel" onclick="javascript:window.location='<?php echo Yii::app()->baseurl;?>/lead/admin';">Cancel</button>
			</div>                                                           
	</div>
	
	<p><a id="form_ids" class='inline hide my_popup' href="#inline_content1">form </a></p>
		<!-- This contains the hidden content for inline calls -->
		<div id="form_boxs" class="hide">
			<div id='inline_content1' style='padding:10px; background:#fff;'>
				<form method="POST" name="validaet_form"></td>
						<table>		
						<tr><td></td><td>Reason For "Not Interested"?</td></tr>
						<tr><td></td><td><input type="checkbox" name="not"  id = "not" value ="Not Expanding">Not Expanding</td></tr>
						<tr><td></td><td><input type="checkbox" name="notins"  id= "notins" value ="Not Interested In The Market">Not Interested In The Market</td></tr>
						<tr><td></td><td><input type="checkbox" name="wrong" id="wrong" value ="Wrong Size(Too big/ Small)">Wrong Size(Too big/ Small)</td></tr>
						<tr><td></td><td><input type="checkbox" name="too" id ="too" value ="Too close to an existing Store">Too close to an existing Store</td></tr>
						
						<tr><td></td><td><input type="checkbox" name="eco" id ="eco" value ="Economics">Economics are out of reach</td></tr>
						
						<tr><td>Another Choice</td><td><textarea id ="other" name="other"></textarea> </td></tr>
						<tr><td></td><td>Would you like to apply to all property</td></tr>
						<tr><td></td><td><input type="checkbox" name="likey" id =="likey" value ="yes">Yes<input type="checkbox" name="liken" id ="liken" value ="No">No</td>
						<tr><td></td><td><input type="submit" class="main-buts" id="save" name="save" value="save"></td></tr>
					</table>
				</form>				        
				<button class ="main-can" type="cancel" onclick="javascript:window.location='<?php echo Yii::app()->baseurl;?>/lead/admin';">Cancel</button>
			</div>                                                           
	</div>
<?php  
$this->menu=array(
	//array('label'=>'List Lead', 'url'=>array('index')),
	array('label'=>'Create Lead', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#lead-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
                                  
?>                                            

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<div class="search-form">
<form method="GET" id="search">
	<div class="proper-lft">
		<div class="txt-log">RETAILER</div>
		<div class="txt-box"><input type="text" name="retailer" value="<?php if(isset($_GET['retailer'])) { echo $_GET['retailer']; } ?>"></div>
		
	</div>
	
	<div class="proper-rgt">
		<div class="txt-log">MIN SIZE</div>
		<div class="txt-box"><input type="text" name="min" value="<?php if(isset($_GET['min'])) { echo $_GET['min']; } ?>"></div>
		
	</div>
	
	<div class="proper-lft">
		<div class="txt-log">USE</div>
		<div class="txt-box">
		<select multiple name ="use[]">
		<option></option>
	
		<option>Accessories</option>
		<option>Apparel - High-end</option>
		<option>Apparel - Middle</option>
		<option>Apparel - Specialty</option>
		<option>Apparel - Value</option>
		<option>Arts/Crafts/Fabrics</option>
		<option>Auto Parts</option>
		<option>Auto Repair</option>
		<option>Automobiles</option>
		<option>Bank</option>
		<option>Beauty Products</option>
		<option>Boating</option>
		<option>Books</option>
		<option>Car Rental</option>
		<option>Card Shop</option>
		<option>Car Wash</option>
		<option>Check Cashing</option>
		<option>Childcare</option>
		<option>Coffee/Tea Shop</option>
		<option>Computers</option>
		<option>Consignment</option>
		<option>Convenience Stores</option>
		<option>Discount - Big Box</option>
		<option>Discount - Smaller Box</option>
		<option>Dollar Store</option>
		<option>Donation Centers</option>
		<option>Educational (Adult)</option>
		<option>Electronics</option>
		<option>Family Entertainment</option>
		<option>Fitness - Big Box</option>
		<option>Fitness - Small Box</option>
		<option>Furniture - Big Box</option>
		<option>Furniture - High-end</option>
		<option>Furniture - Value</option>
		<option>Gas - C-store</option>
		<option>Hair Salon - High-end</option>
		<option>Hair Salon - Low price</option>
		<option>Health Store</option>
		<option>Home Improvement - Big Box</option>
		<option>Home Improvement - Small Box</option>
		<option>Hotel</option>
		<option>Houseware</option>
		<option>Ice Cream/Yogurt Shop/Smoothies</option>
		<option>Jewelry</option>
		<option>Laundromat</option>
		<option>Liquor Store</option>
		<option>Mattress</option>
		<option>Medical/Dental/Rehab/Urgent Care</option>
		<option>Musical Instruments</option>
		<option>Musical Instruments</option>
		<option>Office Supplies</option>
		<option>Optical</option>
		<option>Other</option>
		<option>Paper Store</option>
		<option>Party Goods</option>
		<option>Pet Supplies</option>
		<option>Pharmacy</option>
		<option>Rent to Own</option>
		<option>Shipping</option>
		<option>Shoes - Highend</option>
		<option>Shoes - Value</option>
		<option>Spa</option>
		<option>Sporting Goods - Big Box</option>
		<option>Sporting Goods - small box</option>
		<option>Supermarket - Large Format</option>
		<option>Supermarket - Small Format</option>
		<option>Technology</option>
		<option>Temporary</option>
		<option>Tires</option>
		<option>Theater</option>
		<option>Toys</option>
		<option>Wholesale Clubs</option>
		<option>Wireless Store</option>
		</select></div>
	</div>
	<div class="proper-rgt">
		<div class="txt-log">MAX SIZE</div>
		<div class="txt-box"><input type="text" name="max" value="<?php if(isset($_GET['max'])) { echo $_GET['max']; } ?>">
	</div>
	</div>
	<div class="proper-lft">
		<div class="txt-log">LAST NAME</div>
		<div class="txt-box"><input type="text" value="<?php if(isset($_GET['name'])) { echo $_GET['name']; } ?>" name="name"></div>
		
	</div>
	<div class="proper-rgt">
		<div class="txt-log">STATE</div>
		<div class="txt-box"><input type="text" name="state" value="<?php if(isset($_GET['state'])) { echo $_GET['state']; } ?>"></div>
	
	</div>

	<div class="proper-lft">
		<div class="txt-log">HIGH END</div>
		<div class="txt-box">
		<select name="high">
		<option>-Select One-</option>
		
		<option value="YES" <?php if(isset($_GET['high']) && ($_GET['high'])=='YES') { ?> Selected <?php } ?> >Yes</option>
		<option value="NO" <?php if(isset($_GET['high']) && ($_GET['high'])=='NO') { ?> Selected <?php } ?> >No</option>
		</select>
		</div>
	
	</div>
	
	
	<div class="proper-lft">
		<div class="txt-log">BROKER</div>
		<div class="txt-box">
		<select name="retail">
		<option>-Select One-</option>
		<option value="broker" <?php if (isset($_GET['retail']) && ($_GET['retail'])== 'broker') { ?> Selected <?php } ?>>Yes</option>
		<option value="retailer" <?php if (isset($_GET['retail']) && ($_GET['retail']) == 'retailer') { ?> Selected <?php } ?>>No</option>
		
		</select>
		</div>
	
	</div>
	
	<div class="row-right">
	<input class="main-but" type="submit" name="save" value="GO">
	<input class="main-but" type="reset" name="Clear" value="Clear">
		                                                                                                           
	</div>

</form>
</div>         
               <?php if(isset($_GET['id'])) { 
					    Yii::app()->SESSION['p_id'] = $_GET['id'];
					} ?>           
						  
				<?php $cur_users = Yii::app()->user->id; 
				$uxx = Yii::app()->db->createCommand('SELECT * FROM tbl_users where id='.$cur_users);
				$llx = $uxx->queryAll(); 
				if ($llx[0]['superuser'] == 1){ ?>
				<form method="post" action ="<?php echo Yii::app()->baseurl ;?>/lead/admin">
				<div class="sel-box">
				<select name="property_exists" onchange="this.form.submit()">
				<option value = "" <?php if(Yii::app()->SESSION['p_id']== " " ){?> selected <?php }?>  >--Select Property--</option>
				<?php $command = Yii::app()->db->createCommand('SELECT * FROM `tbl_propery_details');
				$data = $command->queryAll(); ?>
				<?php foreach($data as $res){  ?>
				<option value="<?php echo $res['id']; ?>" <?php if(Yii::app()->SESSION['p_id']==$res['id']){?> selected <?php }?> ><?php echo $res['propert_name']; ?></option> 
				<?php } ?>
				</select></div>
				</form>
				
				<?php 	} else { ?>
				
				<form method="post" action ="<?php echo Yii::app()->baseurl ;?>/lead/admin">
				<div class="sel-box">
				<select name="property_exists" onchange="this.form.submit()">
				<option value = "" <?php if(Yii::app()->SESSION['p_id']== " " ){?> selected <?php }?>  >--Select Property--</option>
				<?php $command = Yii::app()->db->createCommand('SELECT tbl_propery_details.id,tbl_propery_details.propert_name 
					FROM tbl_propery_details 
					LEFT JOIN tbl_property_user 
					ON tbl_propery_details.id=tbl_property_user.pro_id where  tbl_property_user.user_id ='.$cur_users);
				$data = $command->queryAll(); ?>
				<?php foreach($data as $res){  ?>
				<option value="<?php echo $res['id']; ?>" <?php if(Yii::app()->SESSION['p_id']==$res['id']){?> selected <?php }?> ><?php echo $res['propert_name']; ?></option> 
				<?php } ?>
				</select></div>
				</form>
				<?php  } ?>
				                          
				
				</br>
				</br>
	<?php if(isset($_GET['save']) && $_GET['save']== "GO"){ 
		if(isset($_GET['name']) == ""){
			$name= null; }
	else { $name =$_GET['name'];  }
	$npe = $_GET['retailer'];
	$min = $_GET['min'];
	$max = $_GET['max'];
	if(isset($_GET['use'])){
	$suburbArray = $_GET['use'];
	$useses=implode("','",$suburbArray);
	if (!in_array("any", explode(",", $useses))) {
	}
	}else{ $useses = "";}
	$retailer = $_GET['retail'];
	$state = $_GET['state'];
	$h_end = $_GET['high'];
	
	
	
	?>	
	<?php 	 
	$all_id=array();
	$info11=array();
		$aw = Yii::app()->db->createCommand("SELECT * FROM tbl_lead_fields where uses  IN('".$useses."') ||  retail = '".$npe."' || last_name = '".$name."'  || min_size= '".$min."' || max_size = '".$max."' || high_end ='".$h_end."' ||	retail_broker = '".$retailer."'");	
		
		$info = $aw->queryAll();
		foreach($info as $key=>$val)
		{
		$query= Yii::app()->db->createCommand('SELECT * from tbl_property_lead_user where leads_id ='.$val['id']);
		$info1 = $query->queryAll();
		
		if(empty($info1))
		{
			$all_id[]=$val['id'];
		}		
		}	
		
		if(!empty($all_id))
		{
		$aa=implode(',',$all_id);
		
		$query11= Yii::app()->db->createCommand("SELECT * from tbl_lead_fields where id IN (". $aa.")");
		$info11 = $query11->queryAll();
		
		}
		
?>
   <div class="box-min">
		<div class="drag_box box-min-1">
			<div class="hd-b">Raw(<?php echo  count($info11); ?>)</div>
				<div class="box-tx">
					<div id ="first" class="draggable-list main_box">
					<?php if($info11){ ?>
					<?php foreach($info11 as $da){ ?> 
						<div class="draggable-item">
							 <li title="<?php echo $da['id']; ?>">
							<a class="ajax" href="<?php echo Yii::app()->baseUrl;?>/index.php/lead/<?php echo $da['id'];?>">
							<div class="min-hd"><?php echo strtoupper($da['retail']);?></div></a>
							<input type="text" readonly="true" maxlength="255" size="22" value="<?php echo $da['first_name'].' '.$da['last_name'];?> ">
							<input type="text" readonly="true" maxlength="255" size="22" value="<?php echo $da['phone_1'];?> ">
							<input type="text" readonly="true" maxlength="255" size="22" value="<?php echo $da['email_id'];?> "></h5>
							</li>
						</div>
					<?php } } 
					else {  echo "No Record Found";} ?>
				</div>
			</div>
		</div>
	<?php 	} else { ?>  
	
	
	<!--Lead boxes -->
	
		<div class="box-min">
		<div class="drag_box box-min-1">
			<div class="hd-b">Raw(<?php echo  count($datamodel); ?>)</div>
				<div class="box-tx">
					<div id ="first" class="draggable-list main_box">
				
					<?php if($datamodel){ ?>
					<?php foreach($datamodel as $data){ ?> 
					
						<div class="draggable-item">
							 <li title="<?php echo $data['id']; ?>">
							<a class="ajax" href="<?php echo Yii::app()->baseUrl;?>/index.php/lead/<?php echo $data['id'];?>">
							<div class="min-hd"><?php echo strtoupper($data['retail']);?></div></a>
							<?php if($data['radio_staus'] == 2){ ?>
							
							<input type="text" readonly="true" maxlength="255" size="22" value="<?php echo $data['first_name'].' '.$data['last_name'];?> ">
							<input type="text" readonly="true" maxlength="255" size="22" value="<?php echo $data['phone_1'];?> ">
							<input type="text" readonly="true" maxlength="255" size="22" value="<?php echo $data['email_id'];?> ">
							<?php } elseif($data['radio_staus'] == 1) { ?>
							
							<input type="text" readonly="true" maxlength="255" size="22" value="<?php echo $data['broker_firstname'].' '.$data['broker_lastname'];?> ">
							<input type="text" readonly="true" maxlength="255" size="22" value="<?php echo $data['broker_phone_no'];?> ">
							<input type="text" readonly="true" maxlength="255" size="22" value="<?php echo $data['broker_email'];?> ">
							
							<?php } else { ?>
							<input type="text" readonly="true" maxlength="255" size="22" value="<?php echo $data['first_name'].' '.$data['last_name'];?> ">
							<input type="text" readonly="true" maxlength="255" size="22" value="<?php echo $data['phone_1'];?> ">
							<input type="text" readonly="true" maxlength="255" size="22" value="<?php echo $data['email_id'];?> ">
							<?php } ?>
							</h5>
							</li>
						</div>
					<?php } } ?>
				</div>
			</div>
		</div>
		<?php } ?>
		<div class="drag_box box-min-2">
			<div class="hd-b">Interested(<?php echo  count($insts); ?>)</div>
				<div class="box-tx">
					<div id="second" class="draggable-list main_box">
					<?php if($insts){ ?>
						<?php foreach ($insts as $ins) { ?>
						<div class="draggable-item">
						 <li title="<?php echo $ins['id']; ?>">
						<a class="ajax" href="<?php echo Yii::app()->baseUrl;?>/index.php/lead/<?php echo $ins['id'];?>">
						<div class="min-hd"><?php echo strtoupper($ins['retail']);?></div></a>
						<?php ?>
							
							<input type="text" readonly="true" maxlength="255" size="22" value="<?php echo $ins['first_name'].' '.$ins['last_name'];?> ">
							<input type="text" readonly="true" maxlength="255" size="22" value="<?php echo $ins['phone_1'];?> ">
							<input type="text" readonly="true" maxlength="255" size="22" value="<?php echo $ins['email_id'];?> ">
						
					
					  </li>
					</div>
					<?php } } ?>
				</div>
			</div>
		</div>
		
		<div class="drag_box box-min-3">
			<div class="hd-b">Awaiting feedback(<?php echo  count($instt); ?>)</div>
				<div class="box-tx">
					<div id ="third" class="draggable-list main_box">
						<?php if($instt){ ?>
						<?php foreach ($instt as $in) { ?>
						<div class="draggable-item">
							<li title=<?php echo $in['id'];?>>
							<a class="ajax" href="<?php echo Yii::app()->baseUrl;?>/index.php/lead/<?php echo $in['id'];?>">
							<div class="min-hd"><?php echo strtoupper($in['retail']);?></div></a>
						
							
							<input type="text" readonly="true" maxlength="255" size="22" value="<?php echo $in['first_name'].' '.$in['last_name'];?> ">
							<input type="text" readonly="true" maxlength="255" size="22" value="<?php echo $in['phone_1'];?> ">
							<input type="text" readonly="true" maxlength="255" size="22" value="<?php echo $in['email_id'];?> ">
						
							
						
						</li>
						</div>
						<?php } }  ?>			
				</div>
			</div>
		</div>
		
		<div id ="non" title = "aw" class="drag_box box-min-4">
			<div class="hd-b">Not Interested(<?php echo  count($sads); ?>)</div>
				<div class="box-tx">
					<div id ="fourth" class="draggable-list main_box">
						<?php if($sads){ ?>
						<?php foreach ($sads as $sas) { ?>
						<div class="draggable-item">
							<li title=<?php echo $sas['id'];?>>
							<a class="ajax" href="<?php echo Yii::app()->baseUrl;?>/index.php/lead/<?php echo $sas['id'];?>">
							<div class="min-hd"><?php echo strtoupper($sas['retail']);?></a></div>
							<input type="text" readonly="true"  maxlength="255" size="22" value="<?php echo $sas['first_name'].' '.$sas['last_name'];?> ">
							<input type="text" readonly="true" maxlength="255" size="22" value="<?php echo $sas['phone_1'];?> ">
							<input type="text" readonly="true" maxlength="255" size="22" value="<?php echo $sas['email_id'];?> "></li>
							
							
							
						</div>
						<?php } ?>
					
							
							<?php  $_Lead = Lead::Model()->findAllByAttributes(array('status'=>4)); ?>
							
								<?php foreach($_Lead as $_da) {?>

								<li title=<?php echo $_da['id'];?>>
									<div class="min-hd"><?php echo strtoupper($_da['retail']);?></a></div>
									<input type="text" readonly="true"  maxlength="255" size="22" value="<?php echo $_da['first_name'].' '.$_da['last_name'];?> ">
									<input type="text" readonly="true" maxlength="255" size="22" value="<?php echo $_da['phone_1'];?> ">
								<input type="text" readonly="true" maxlength="255" size="22" value="<?php echo $_da['email_id'];?>">
							</li>
						
					<?php	} } ?>			
				</div>
			</div>
		</div>
		<div id ="non" title = "aw" class="drag_box box-min-5">
			<div class="hd-b">AT LEASE/SIGNED(<?php if(isset($says)) { echo  count($says); } ?>)</div>
				<div class="box-tx">
					<div id ="fifth" class="draggable-list main_box">
						<?php if(isset($says)){ ?>
						<?php foreach ($says as $sask) { ?>
						<div class="draggable-item">
							<li title=<?php echo $sask['id'];?>>
							<a class="ajax" href="<?php echo Yii::app()->baseUrl;?>/index.php/lead/<?php echo $sask['id'];?>">
							<div class="min-hd"><?php echo strtoupper($sask['retail']);?></a></div>
							<input type="text" readonly="true"  maxlength="255" size="22" value="<?php echo $sask['first_name'].' '.$sask['last_name'];?> ">
							<input type="text" readonly="true" maxlength="255" size="22" value="<?php echo $sask['phone_1'];?> ">
							<input type="text" readonly="true" maxlength="255" size="22" value="<?php echo $sask['email_id'];?> "></li>
						</div>
						<?php } }  ?>			
				</div>
			</div>
		</div>
		
		
		
	</div>

	
		<?php if(isset($_GET['yt0']) =="Search") {  ?>
<?php  $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'lead-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
	array('header'=>'S.No',
		'value'=>'++$row',
		),
		'first_name',
		'enquiry_date',
		'enquiry_source',
		'phone_1',
		'email_id',
		'reminder_date',
		'message', 
		
		/* 'priority_sub_source',
		'first_name',
		'middle_name',
		'last_name',
		'country',
		'state',
		'city',
		'gender',
		'address',
		'phone_1',
		'phone_2',
		'phone_3',
		'email_id',
		'reminder_date',
		'reminder_time',
		'message', */
		
		 array(
			'class'=>'CButtonColumn',
		),
		),
)); } else{ } ?>
