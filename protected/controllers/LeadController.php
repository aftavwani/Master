<?php
class LeadController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','ajax','Ajaxins','Ajaxsas'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','Useradmin','admin'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','Useradmin','Importexcel','import','export','generateExcel'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		//$this->layout = false;
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{	
		$model=new Lead;
		$result= new User;
		$res = User::Model()->findallByattributes(array('superuser'=>2));
		$leaduser = new LeadUsers;
		$prop = Priority::Model()->findall();
		$rem = Reminders::Model()->findall();
		                                                                    
		if(isset($_POST['Lead']))
		{  
			
			/* $model->reminder_time=$_POST['Lead']['reminder_time'].':'.$_POST['Lead']['sec']; */
			$model->status =1;
		
			$model->min_size= $_POST['Lead']['min_size'];
			$model->max_size= $_POST['Lead']['max_size'];
			$model->retailer_webiste= $_POST['Lead']['retailer_webiste'];			
			$model->broker_firstname= $_POST['Lead']['broker_firstname'];
			$model->broker_lastname= $_POST['Lead']['broker_lastname'];
			$model->broker_territory= $_POST['Lead']['broker_territory'];
			$model->broker_company= $_POST['Lead']['broker_company'];
	/* 		$model->broker_phone_no= $_POST['broker_phone_no'];
			$model->broker_cell_no= $_POST['broker_cell_no'];
			$model->broker_email= $_POST['broker_email'];  */
			$model->linked_username =$_POST['Lead']['linked_username'];
			$model->enquiry_date=$_POST['enquiry_date'];
			$model->create_at = date('Y-m-d-h:i:sa');
			$model->country=$_POST['country'];
		/* 	$model->reminder_date=$_POST['reminder_date']; */
			$model->user_id=Yii::app()->user->id;	
			$model->attributes=$_POST['Lead'];  
		/* 	echo "<pre>"; print_r(array($model->attributes,$_POST));  */
			if($model->save()) {				
				/* if(isset($_POST['reminder_date'])){
				$Last_id = $model->id; 
				$status = 1;
				Yii::app()->db->createCommand("INSERT INTO `tbl_reminders`(`lead_id`,`date`,`time`,`msg`,`status` ) VALUES ('".$Last_id."', '".$_POST['reminder_date']."','".$_POST['Lead']['reminder_time'].":".$_POST['Lead']['sec']."','".$_POST['Lead']['message']."','".$status."')"  )->execute(); } */
								
				$this->redirect(array('admin'));
			}		
		}
		$this->render('create',array('model'=>$model,'models'=>$res,'props'=>$prop));
	}                                                                
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Lead']))
		{			
			$model->attributes=$_POST['Lead'];  
			/* $model->reminder_time=$_POST['Lead']['reminder_time'].':'.$_POST['Lead']['sec']; */
			$model->status =1;
			$model->retailer_webiste= $_POST['Lead']['retailer_webiste'];			
			$model->broker_firstname= $_POST['Lead']['broker_firstname'];
			$model->broker_lastname= $_POST['Lead']['broker_lastname'];
			$model->broker_territory= $_POST['Lead']['broker_territory'];
			$model->broker_company= $_POST['Lead']['broker_company'];
			$model->retailer_webiste= $_POST['Lead']['retailer_webiste'];
			$model->min_size= $_POST['Lead']['min_size'];
			$model->max_size= $_POST['Lead']['max_size'];
		/* 	$model->broker_email= $_POST['broker_email']; */
			$model->linked_username =$_POST['Lead']['linked_username'];
		 	$model->retail= $_POST['Lead']['retail']; 
			$model->enquiry_date=$_POST['enquiry_date'];
			$model->country=$_POST['country'];	
		/* 	$model->reminder_date=$_POST['reminder_date']; */
			$model->user_id=Yii::app()->user->id;
			$date = date('Y-m-d-h:i:sa'); 				
			if($model->save()) {			
			Yii::app()->db->createCommand("INSERT INTO `tbl_users_activity`(`user_id`,`lead_id`,`update_date` ) VALUES ('".Yii::app()->user->id."', '".$id."','".$date."')")->execute();
				if(isset($_POST['Lead']['user_id']) && $_POST['Lead']['user_id']==true){
					$Last_id = $model->id; 
					foreach($_POST['Lead']['user_id'] as $states ){
					$leaduser->user_id = $states;
					Yii::app()->db->createCommand("INSERT INTO `tbl_lead_users`(`user_id`, `leads_id`) VALUES ('".$states."', '".$Last_id."')"  )->execute();
				}
				}
				/* if(isset($_POST['reminder_date']) && $_POST['reminder_date']==true){
					$Last_id = $model->id; 
					$status = 1;
					Yii::app()->db->createCommand("INSERT INTO `tbl_reminders`(`lead_id`,`date`,`time`,`status` ) VALUES ('".$Last_id."', '".$_POST['reminder_date']."','".$_POST['Lead']['reminder_time'].":".$_POST['Lead']['sec']."','".$status."')"  )->execute();
				
				} */
			
					$this->redirect(array('admin'));
				}
			}
		$this->render('update',array(
			'model'=>$model,
		));
	}
	                                                                                         
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{		
		$dels = Yii::app()->db->createCommand('DELETE FROM `tbl_property_lead_user` WHERE leads_id='.$id)->execute();
		$del = Yii::app()->db->createCommand('DELETE FROM `tbl_reminders` WHERE lead_id='.$id)->execute();
		$this->loadModel($id)->delete();
		

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
		
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Lead');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{		
		$model=new Lead('search');
			$model->unsetAttributes();	 
			if (empty($_POST['property_exists'])){
				Yii::app()->SESSION['p_id']; }
			else{
			  Yii::app()->SESSION['p_id'] =  $_POST['property_exists'];	}
			
		$comma = Yii::app()->db->createCommand('SELECT * FROM tbl_lead_fields WHERE id NOT IN (SELECT leads_id FROM tbl_property_lead_user)');			
		$data = $comma->queryAll();
		
		

		$comma = Yii::app()->db->createCommand('SELECT tbl_lead_fields.retail,tbl_lead_fields.id, tbl_lead_fields.email_id,	tbl_lead_fields.first_name,tbl_lead_fields.last_name,tbl_lead_fields.phone_1 FROM
		tbl_lead_fields JOIN 
		tbl_property_lead_user ON tbl_lead_fields.id = tbl_property_lead_user.leads_id  and tbl_property_lead_user.pro_id = "'.Yii::app()->SESSION['p_id'].'" and tbl_property_lead_user.status =2');			
		$inst = $comma->queryAll(); 	
			
		$commands = Yii::app()->db->createCommand('SELECT tbl_lead_fields.retail,tbl_lead_fields.id,tbl_lead_fields.email_id,						tbl_lead_fields.first_name,tbl_lead_fields.last_name,tbl_lead_fields.phone_1 FROM
		tbl_lead_fields JOIN 
		tbl_property_lead_user ON tbl_lead_fields.id = tbl_property_lead_user.leads_id  and tbl_property_lead_user.pro_id = "'.Yii::app()->SESSION['p_id'].'" and tbl_property_lead_user.status =3');			
		$instbn = $commands->queryAll(); 		
		
		$command = Yii::app()->db->createCommand('SELECT tbl_lead_fields.retail, tbl_lead_fields.id,tbl_lead_fields.email_id, tbl_lead_fields.first_name,tbl_lead_fields.last_name,tbl_lead_fields.phone_1 FROM
		tbl_lead_fields JOIN 
		tbl_property_lead_user ON tbl_lead_fields.id = tbl_property_lead_user.leads_id  and tbl_property_lead_user.pro_id = "'.Yii::app()->SESSION['p_id'].'" and tbl_property_lead_user.status =4');			
		$sad = $command->queryAll(); 
		
		$awx = Yii::app()->db->createCommand('SELECT tbl_lead_fields.retail, tbl_lead_fields.id,tbl_lead_fields.email_id, tbl_lead_fields.first_name,tbl_lead_fields.last_name,tbl_lead_fields.phone_1 FROM
		tbl_lead_fields JOIN 
		tbl_property_lead_user ON tbl_lead_fields.id = tbl_property_lead_user.leads_id  and tbl_property_lead_user.pro_id = "'.Yii::app()->SESSION['p_id'].'" and tbl_property_lead_user.status =5');			
		$myxyz = $awx->queryAll(); 
		
		                                                                                    
		// clear any default values
		if(isset($_GET['Lead']))
			$model->attributes=$_GET['Lead'];
	
		$this->render('admin',array(
			'model'=>$model,'datamodel'=>$data,'insts'=>$inst,'instt'=>$instbn,'sads'=>$sad,'says'=>$myxyz 
		));
	}

	// manage all user admin
		public function actionUseradmin(){
	
		$user_id = Yii::app()->user->id;
		$model=new Lead('search');
		$model->unsetAttributes();
		if(isset($_POST['property_exists'])){
		echo "hello";
		$user_id = Yii::app()->user->id;
		$sta=1;
		$sts=2;
		$stt=3;
		$stf=4;
		$p_id = $_POST['property_exists'];
		
		Yii::app()->SESSION['p_id']= $_POST['property_exists'];
		$data = Yii::app()->db->createCommand('select  m.propert_name, 							s.organisation_name,s.phone_1,s.email_id,s.message,s.id,s.enquiry_source,s.status,s.first_name from tbl_lead_fields s
		join tbl_lead_users mr on mr.leads_id=s.id
		join tbl_propery_details m on m.id=s.property_id
		where mr.user_id="'.$user_id.'" and s.status="'.$sta.'" and s.property_id="'.$p_id.'"')->queryAll();
		
		$inst = Yii::app()->db->createCommand('select  m.propert_name, 							s.organisation_name,s.phone_1,s.email_id,s.message,s.id,s.enquiry_source,s.status,s.first_name from tbl_lead_fields s
		join tbl_lead_users mr on mr.leads_id=s.id
		join tbl_propery_details m on m.id=s.property_id
		where mr.user_id="'.$user_id.'" and s.status="'.$sts.'" and s.property_id="'.$p_id.'"')->queryAll();
		
		$instbn = Yii::app()->db->createCommand('select  m.propert_name, 							s.organisation_name,s.phone_1,s.email_id,s.message,s.id,s.enquiry_source,s.status,s.first_name from tbl_lead_fields s
		join tbl_lead_users mr on mr.leads_id=s.id
		join tbl_propery_details m on m.id=s.property_id
		where mr.user_id="'.$user_id.'" and s.status="'.$stt.'" and s.property_id="'.$p_id.'"')->queryAll();
		
		$sad = Yii::app()->db->createCommand('select  m.propert_name, 							s.organisation_name,s.phone_1,s.email_id,s.message,s.id,s.enquiry_source,s.status,s.first_name from tbl_lead_fields s
		join tbl_lead_users mr on mr.leads_id=s.id
		join tbl_propery_details m on m.id=s.property_id
		where mr.user_id="'.$user_id.'" and s.status="'.$stf.'" and s.property_id="'.$p_id.'"')->queryAll();
			
		}
		else {
		$user_id = Yii::app()->user->id;
		$sta=1;
		$sts=2;
		$stt=3;
		$stf=4;
		
		$data = Yii::app()->db->createCommand('select  m.propert_name, 							s.organisation_name,s.phone_1,s.email_id,s.message,s.id,s.enquiry_source,s.status,s.first_name from tbl_lead_fields s
		join tbl_lead_users mr on mr.leads_id=s.id
		join tbl_propery_details m on m.id=s.property_id
		where mr.user_id="'.$user_id.'" and s.status="'.$sta.'"')->queryAll();
		
		$inst = Yii::app()->db->createCommand('select  m.propert_name, 							s.organisation_name,s.phone_1,s.email_id,s.message,s.id,s.enquiry_source,s.status,s.first_name from tbl_lead_fields s
		join tbl_lead_users mr on mr.leads_id=s.id
		join tbl_propery_details m on m.id=s.property_id
		where mr.user_id="'.$user_id.'" and s.status="'.$sts.'"')->queryAll();
		
		$instbn = Yii::app()->db->createCommand('select  m.propert_name, 							s.organisation_name,s.phone_1,s.email_id,s.message,s.id,s.enquiry_source,s.status,s.first_name from tbl_lead_fields s
		join tbl_lead_users mr on mr.leads_id=s.id
		join tbl_propery_details m on m.id=s.property_id
		where mr.user_id="'.$user_id.'" and s.status="'.$stt.'"')->queryAll();
		
		$sad = Yii::app()->db->createCommand('select  m.propert_name, 							s.organisation_name,s.phone_1,s.email_id,s.message,s.id,s.enquiry_source,s.status,s.first_name from tbl_lead_fields s
		join tbl_lead_users mr on mr.leads_id=s.id
		join tbl_propery_details m on m.id=s.property_id
		where mr.user_id="'.$user_id.'" and s.status="'.$stf.'"')->queryAll();
	
		}
			
		// clear any default values
		if(isset($_GET['Lead']))
			$model->attributes=$_GET['Lead'];

		$this->render('admin',array(
			'model'=>$model,'datamodel'=>$data,'insts'=>$inst,'instt'=>$instbn,'sads'=>$sad 
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Lead the loaded model
	 * @throws CHttpException
	 */   
	public function loadModel($id)
	{
		$model=Lead::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	/**
	Jquery Ajax on drag and drop page.	
	******/
	public function actionAjax(){
		
 
		if(isset($_POST['sort_order']) && !empty($_POST['sort_order']))  {
		
		$ids = $_POST['sort_order'];
		$box = $_POST['boxid'];
		$msg = $_POST['pesrson_n'];
		$rem = $_POST['remindre'];
		$mms = $_POST['message'];
		$date = date('Y-m-d-h:i:sa'); 
				
		 if($box == 'first')	{
		 $status = 1;
		 	 $update = Yii::app()->db->createCommand('INSERT INTO `tbl_reminders`(user_id,`lead_id`,pro_id, `date`, `time`, msg, `status`) VALUES ("'.Yii::app()->user->id.'","'.$ids.'","'.Yii::app()->SESSION['p_id'].'","'.$rem.'","'.$msg.'","'.$mms.'","'.$status.'")')->execute();
		 $insert = Yii::app()->db->createCommand('INSERT INTO `tbl_property_lead_user`(`pro_id`,user_id,`leads_id`, `status`) VALUES ("'.Yii::app()->SESSION['p_id'].'","'.Yii::app()->user->id.'","'.$ids.'","'.$status.'")')->execute();
		 
		}
		elseif ($box == 'second'){
		 $status = 2;
		 		 
			 
			 $wani = Yii::app()->db->createCommand('SELECT * FROM tbl_reminders where lead_id ="'.$ids.'" and pro_id ="'.Yii::app()->SESSION['p_id'].'"')->execute();
			 
			  if($wani == 0){
			  $insert = Yii::app()->db->createCommand('INSERT INTO `tbl_reminders`(user_id,`lead_id`,pro_id, `date`, `time`, msg, `status`) VALUES ("'.Yii::app()->user->id.'","'.$ids.'","'.Yii::app()->SESSION['p_id'].'","'.$rem.'","'.$msg.'","'.$mms.'","'.$status.'")')->execute();
			  }
			  else {
			$update = Yii::app()->db->createCommand('UPDATE tbl_reminders SET date ="'.$rem.'",`time`="'.$msg.'",status = "'.$status.'",`msg`="'.$mms.'" where lead_id ="'.$ids.'" and pro_id = "'.Yii::app()->SESSION['p_id'].'"')->execute();			
			}		 
			 
			 $command = Yii::app()->db->createCommand('SELECT * FROM tbl_property_lead_user where leads_id ="'.$ids.'" and pro_id ="'.Yii::app()->SESSION['p_id'].'"')->execute();
			 if($command == 0){
			 	 $insert = Yii::app()->db->createCommand('INSERT INTO `tbl_property_lead_user`(`pro_id`,user_id,`leads_id`, `status`) VALUES ("'.Yii::app()->SESSION['p_id'].'","'.Yii::app()->user->id.'","'.$ids.'","'.$status.'")')->execute();
				 }
			else {
			$update = Yii::app()->db->createCommand("UPDATE tbl_property_lead_user SET status =2 where leads_id =".$ids)->execute();			
			}		 	 
		}
		elseif ($box == 'third'){
		 $status = 3;
			 $wani = Yii::app()->db->createCommand('SELECT * FROM tbl_reminders where lead_id ="'.$ids.'" and pro_id ="'.Yii::app()->SESSION['p_id'].'"')->execute();
			  if($wani == 0){
			  $insert = Yii::app()->db->createCommand('INSERT INTO `tbl_reminders`(user_id,`lead_id`,pro_id, `date`, `time`, msg, `status`) VALUES ("'.Yii::app()->user->id.'","'.$ids.'","'.Yii::app()->SESSION['p_id'].'","'.$rem.'","'.$msg.'","'.$mms.'","'.$status.'")')->execute();
			  }
			  else {
			$update = Yii::app()->db->createCommand('UPDATE tbl_reminders SET date ="'.$rem.'",`time`="'.$msg.'",status = "'.$status.'",`msg`="'.$mms.'" where lead_id ="'.$ids.'" and pro_id = "'.Yii::app()->SESSION['p_id'].'"')->execute();		
			}		 
		 $command = Yii::app()->db->createCommand('SELECT * FROM tbl_property_lead_user where leads_id ='.$ids)->execute();
			 if($command == 0){
			 	 $insert = Yii::app()->db->createCommand('INSERT INTO `tbl_property_lead_user`(`pro_id`,user_id,`leads_id`, `status`) VALUES ("'.Yii::app()->SESSION['p_id'].'","'.Yii::app()->user->id.'","'.$ids.'","'.$status.'")')->execute(); }
			else {
			$update = Yii::app()->db->createCommand("UPDATE tbl_property_lead_user SET status =3 where leads_id =".$ids)->execute();			
			}		 
		
		} 
		elseif ($box == 'fifth'){
		 $status = 5;
		 $sy=date('Y-m-d');
			 $wani = Yii::app()->db->createCommand('SELECT * FROM tbl_reminders where lead_id ="'.$ids.'" and pro_id ="'.Yii::app()->SESSION['p_id'].'"')->execute();
			  if($wani == 0){
			  $insert = Yii::app()->db->createCommand('INSERT INTO `tbl_reminders`(user_id,`lead_id`,pro_id, `date`, `status`) VALUES ("'.Yii::app()->user->id.'","'.$ids.'","'.Yii::app()->SESSION['p_id'].'","'.$sy.'","'.$status.'")')->execute();
			  }
			  else {
			}		 
		 $command = Yii::app()->db->createCommand('SELECT * FROM tbl_property_lead_user where leads_id ='.$ids)->execute();
			 if($command == 0){
			 	 $insert = Yii::app()->db->createCommand('INSERT INTO `tbl_property_lead_user`(`pro_id`,user_id,`leads_id`, `status`) VALUES ("'.Yii::app()->SESSION['p_id'].'","'.Yii::app()->user->id.'","'.$ids.'","'.$status.'")')->execute(); }
			else {
			$update = Yii::app()->db->createCommand("UPDATE tbl_property_lead_user SET status =5 where leads_id =".$ids)->execute();			
			}					
		}
		
		else{
		 $status = 4;
		 if(empty($_POST['wani'])){ $awani = 0;  } else { $awani = $_POST['wani']; }
		 if(empty($_POST['abc'])){ $abc = 0;  } else { $abc = $_POST['abc']; }
		 if(empty($_POST['abc1'])){ $abcd = 0;  } else { $abcd = $_POST['abc1']; }
		 if(empty($_POST['abc2'])){ $abcde = 0;  } else { $abcde = $_POST['abc2']; }
		 if(empty($_POST['abc3'])){ $abcdef = 0;  } else { $abcdef = $_POST['abc3']; }
		 if(empty($_POST['xy'])){ $abde = 0;  } else { $abde = $_POST['xy']; }
		 if(empty($_POST['ab'])){ $abdf = 0;  } else { $abdf = $_POST['ab']; }	
		 if(empty($_POST['pesrson_n'])){ $abddf = 0;  } else { $abddf = $_POST['pesrson_n']; }	
		 if(isset($_POST['xy']) == 'yes'){
		 $update = Yii::app()->db->createCommand("UPDATE tbl_lead_fields SET status =4 where id =".$ids)->execute();			
			
		 }
		/*  $wani = Yii::app()->db->createCommand('SELECT * FROM tbl_reminders where lead_id ="'.$ids.'" and pro_id ="'.Yii::app()->SESSION['p_id'].'"')->execute();
			  if($wani == 0){
			  $insert = Yii::app()->db->createCommand('INSERT INTO `tbl_reminders`(user_id,`lead_id`,pro_id, `date`, `time`, msg, `status`) VALUES ("'.Yii::app()->user->id.'","'.$ids.'","'.Yii::app()->SESSION['p_id'].'","'.$rem.'","'.$msg.'","'.$mms.'","'.$status.'")')->execute();
			  }
			  else {
			$update = Yii::app()->db->createCommand('UPDATE tbl_reminders SET date ="'.$rem.'",`time`="'.$msg.'",status = "'.$status.'",`msg`="'.$mms.'" where lead_id ="'.$ids.'" and pro_id = "'.Yii::app()->SESSION['p_id'].'"')->execute();
			} */		 
		 $command = Yii::app()->db->createCommand('SELECT * FROM tbl_property_lead_user where leads_id ='.$ids)->execute();
			 if($command == 0){
			 	 $insert = Yii::app()->db->createCommand('INSERT INTO `tbl_property_lead_user`(`pro_id`,user_id,`leads_id`, `status`, `check_1`, `check_2`, `check_3`, `check_4`, `check_5`,`check_6`, `other`) VALUES ("'.Yii::app()->SESSION['p_id'].'","'.Yii::app()->user->id.'","'.$ids.'","'.$status.'","'.$abc.'","'.$abcd.'","'.$abcde.'","'.$abcdef.'","'.$abde.'","'.$awani.'","'.$abddf.'")')->execute(); }
			else {
			$update = Yii::app()->db->createCommand("UPDATE tbl_property_lead_user SET status =4,check_1 = '".$abc."',check_2 = '".$abcd."',check_3 = '".$abcde."',check_4 ='".$abcdef."',check_5 = '".$abde."',other ='".$abddf."'  where leads_id =".$ids)->execute();			
			}		
		} 
			
		}
	}
	
	/**
	 * Performs the AJAX validation.
	 * @param Lead $model the model to be validated
	 */
	 public function actionImportexcel(){
			$this->render('importexcel');
		}
	  public function actionImport(){
	
			$this->render('import');
		}
		
	  public function actionExport(){
	
			$this->render('export');
		}
		
		
	 	public function actiongenerateExcel()
			{
		 header("Content-Type: application/vnd.ms-excel;");
		 header("Content-Disposition: attachment; filename=export.xls");
		 header("Pragma: no-cache");
		 header("Expires: 0");  
		 
			 
			$countModel = Lead::Model()->findAllByAttributes(array(),array(
			'order' => 'id desc',
			'limit' => Yii::app()->Session['datepick'],
			));
			
			 ?>
					<table>
						<tr>
							<th>S.NO</th>
							<th>Lead Title</th>
							<th>Use</th>	
							<th>Retailer Website</th>	
							<th>Tenant Rep</th>	
							<th>First Name</th>
							<th>Last Name</th>
							<th>Phone No</th>
							<th>Email Id</th>
							<th>Title</th>
							<th>High End</th>
							<th>Min Size</th>
							<th>Max Size</th>	
							<th>State</th>	
							<th>Message</th>	
							<th>Broker</th>	
							<th>Broker First Name</th>	
							<th>Broker Last Name</th>	
							<th>Broker Phone Number</th>	
							<th>Broker Cell Number</th>	
							<th>Broker email</th>	
							<th>Broker Company</th>	
							<th>Broker territory</th>	
						</tr>
					<?php $k=1;	foreach ($countModel as $data){ ?>
						<tr>
							<td><?php echo $k++; ?></td>
							<td><?php echo $data['retail']; ?></td>
							<td><?php echo $data['uses']; ?></td>
							<td><?php echo $data['retailer_webiste']; ?></td>
							<td><?php echo $data['tenant _rep']; ?></td>
							<td><?php echo $data['first_name']; ?></td>
							<td><?php echo $data['last_name']; ?></td>
							<td><?php echo $data['phone_1']; ?></td>
							<td><?php echo $data['email_id']; ?></td>
							<td><?php echo $data['title']; ?></td>
							<td><?php echo $data['high_end']; ?></td>
							<td><?php echo $data['min_size']; ?></td>
							<td><?php echo $data['max_size']; ?></td>
							<td><?php echo $data['state']; ?></td>
							<td><?php echo $data['message']; ?></td>
							<td><?php echo $data['repersented_by_broker']; ?></td>
							<td><?php echo $data['broker_firstname']; ?></td>
							<td><?php echo $data['broker_lastname']; ?></td>
							<td><?php echo $data['broker_phone_no']; ?></td>
							<td><?php echo $data['broker_cell_no']; ?></td>
							<td><?php echo $data['broker_email']; ?></td>
							<td><?php echo $data['broker_company']; ?></td>
							<td><?php echo $data['broker_territory']; ?></td>
							
						</tr>					
					<?php } ?>
					</table>



			
		<?php   
		exit;
		
	}
		  
	 
	 
	 
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='lead-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
