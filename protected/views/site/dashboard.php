<h1 class="mid_hed">Properties</h1>

		<?php if(isset($_POST['property_exists'])){
			Yii::app()->SESSION['up_id'] = $_POST['property_exists'] ; 
			}
			if(isset(Yii::app()->SESSION['up_id'])){
			$command = Yii::app()->db->createCommand('SELECT * FROM `tbl_propery_details` WHERE id = '.Yii::app()->SESSION['up_id']);
			$anb = $command->queryAll(); 		
			?>	
			
			
			<div class="img_div" >			
			<img class ="pro_img" alt = "Property Image" src= "<?php echo Yii::app()->baseurl;?>/uploads/img/<?php echo $anb[0]['image']; ?>">
			<div class="pro_left">
			<h2>Property Name:-<?php echo $anb[0]['propert_name']; ?></h2>
			<h2>Property Type:-<?php echo $anb[0]['property_type']; ?></h2>
			<h2>Address:-<?php echo $anb[0]['street_address']; ?></h2>
			<h2>Status:-<?php echo $anb[0]['status']; ?></h2>
			</div>			
			</div>
			<?php } ?>
			

			
			<?php $cur_users = Yii::app()->user->id; ?>
			<form method="post" action ="<?php echo Yii::app()->baseurl ;?>/site/dashboard">
				<div class="sel-boxs">
				<select name="property_exists" onchange="this.form.submit()">
				<option value = "<?php echo Yii::app()->SESSION['up_id']; ?>" <?php if(Yii::app()->SESSION['p_id']== " " ){?> selected <?php }?>  >--Select Property--</option>
				<?php $command = Yii::app()->db->createCommand('SELECT * FROM `tbl_propery_details` WHERE property_owner = '.$cur_users);
				$data = $command->queryAll(); ?>
						
				<?php foreach($data as $res){  ?>
				<option value="<?php echo $res['id'];?>" <?php if(Yii::app()->SESSION['up_id']==$res['id']){?> selected <?php }?>  ><?php echo $res['propert_name']; ?></option> 
				<?php } ?>
				</select></div>
				</form>
				
				<?php $cmm = Yii::app()->db->createCommand('
				SELECT  a.retail,
						b.msg,
						b.status,
						b.date,
						a.create_at
				FROM    tbl_lead_fields a
						INNER JOIN tbl_reminders b
							ON a.id = b.lead_id
				WHERE   b.pro_id = "'.Yii::app()->SESSION['up_id'].'" and b.status =2');
				
				$tata = $cmm->queryAll();
			?>
				
				
	<div class="box-min">
		
		<div class="drag_box box-min-22">
			<div class="hd-b">INTERESTED</div>
			
				<div class="box-tx">
					<div id="second" class="draggable-list main_box">
				<?php if($tata) { 
				foreach ($tata as $tt) {?>
				
				<div class="min-hds"><?php echo strtoupper($tt['retail']);?></div></a>
				<h5><input type="text" readonly="true" maxlength="255" size="25" value="<?php echo $tt['create_at'];?> ">
				<input type="text" readonly="true" maxlength="255" size="25" value="Follow Up <?php echo $tt['date'];?> ">
				</h5>
				<?php  } } ?>	
				</div>
			</div>
			
		</div>	

	<?php $cmd = Yii::app()->db->createCommand('
				SELECT  a.retail,
						b.check_1,
						b.check_2,
						b.check_3,
						b.check_4,
						b.other,
						a.create_at						
				FROM    tbl_lead_fields a
						INNER JOIN tbl_property_lead_user b
							ON a.id = b.leads_id
				WHERE   b.pro_id = "'.Yii::app()->SESSION['up_id'].'" and b.status =4');
				
				$tatb = $cmd->queryAll();
				
			?>		
		<div class="drag_box box-min-33">
			<div class="hd-b">NOT INTERESTED</div>
				<div class="box-tx">
					<div id ="third" class="draggable-list main_box">
					<?php if($tata) { 
				foreach ($tatb as $txx) {?>
				
				<div class="min-hds"><?php echo strtoupper($txx['retail']);?></div></a>
				<h5><input type="text" readonly="true" maxlength="255" size="25" value="<?php echo $txx['create_at'];?> ">
				<?php if(!empty($txx['check_1'])){ echo $txx['check_1']; } ?>
				<?php if(!empty($txx['check_2'])){ echo $txx['check_2']; } ?>
				<?php if(!empty($txx['check_3'])){ echo $txx['check_3']; } ?>
				<?php if(!empty($txx['check_4'])){ echo $txx['check_4']; } ?>
				<?php if(!empty($txx['other'])){ echo $txx['other']; } ?>
				</h5>
				<?php  } } ?>	
						<div class="draggable-item">
					</div>
				</div>
			</div>
		</div>		
	 <?php $cmn = Yii::app()->db->createCommand('
				SELECT  a.retail,
						b.msg,
						b.status,
						b.date,
						a.create_at
				FROM    tbl_lead_fields a
						INNER JOIN tbl_reminders b
							ON a.id = b.lead_id
				WHERE   b.pro_id = "'.Yii::app()->SESSION['up_id'].'" and b.status =3');
				
				$tab = $cmn->queryAll();
			?>
				
			
		<div id ="non" title = "aw" class="drag_box box-min-44">
			<div class="hd-b">AWAITING FEEDBACK</div>
				<div class="box-tx">
					<div id ="fourth" class="draggable-list main_box">
						<?php if($tab) { 
						foreach ($tab as $ttx) {?>
				
				<div class="min-hds"><?php echo strtoupper($ttx['retail']);?></div></a>
				<h5><input type="text" readonly="true" maxlength="255" size="25" value="<?php echo $ttx['create_at'];?> ">
				<input type="text" readonly="true" maxlength="255" size="25" value="Follow Up <?php echo $ttx['date'];?> ">
				</h5>
				<?php  } } ?>	
				</div>
			</div>
		</div>
	
		 <?php $cmno = Yii::app()->db->createCommand('
				SELECT  a.retail,
						b.msg,
						b.status,
						b.date,
						a.create_at
				FROM    tbl_lead_fields a
						INNER JOIN tbl_reminders b
							ON a.id = b.lead_id
				WHERE   b.pro_id = "'.Yii::app()->SESSION['up_id'].'" and b.status = 5');
				
				$tac = $cmno->queryAll();
				
			?>
		<div id ="non" title = "aw" class="drag_box box-min-55">
			<div class="hd-b">SIGNED LOI/AT LEASE</div>
				<div class="box-tx">
					<div id ="fourth" class="draggable-list main_box">
						<?php if($tac) { 
						foreach ($tac as $ttxc) {?>
				
						<div class="min-hds"><?php echo strtoupper($ttxc['retail']);?></div></a>
						<h5><input type="text" readonly="true" maxlength="255" size="25" value="<?php echo $ttxc['create_at'];?> ">
						
						</h5>
				<?php  } } ?>	
				</div>
			</div>
		</div>
	</div>