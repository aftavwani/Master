<?php 
class PropertydetailsController extends Controller
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
				'actions'=>array('index','view', 'update','admin','fetchstates','admin'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create', 'update','admin'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('admin','delete'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
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
	 
			
		 function generateRandomString($length = 2) {
			$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);

			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			return $randomString;
		}
	
		$cur_user = Yii::app()->user->id;
		$user = User::Model()->findAllByAttributes(array('id'=>$cur_user));
		if($user[0]['superuser']==1 or $user[0]['superuser']==2 or $user[0]['superuser']==3){	
	
		$path='/uploads/img/';
		$rnd = rand(0,9999); 
		$model=new PropertyDetails;  
		

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['PropertyDetails']))
		{
			
		
			$uploadedFile=CUploadedFile::getInstance($model,'image');
			$fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
			$model->image = $fileName;
			$model->slug =$_POST['PropertyDetails']['propert_name'].'_'. generateRandomString();
			
			$model->user_id=Yii::app()->user->id;
			/* $model->country=$_POST['country']; */
			$model->attributes=$_POST['PropertyDetails'];
			$model->unit=$_POST['PropertyDetails']['unit'][0];
			$model->unit_2=$_POST['PropertyDetails']['unit'][1];
			$model->unit_3=$_POST['PropertyDetails']['unit'][2];
			//echo "<pre>"; print_r($model->attributes); die;
			if($model->validate() && $model->save()) {
			  	$uploadedFile->saveAs(Yii::app()->basePath.'/../uploads/img/'.$fileName);
				if(isset($_POST['assign_user'])){
					foreach($_POST['assign_user'] as $uid){
					$Last_id = $model->id; 
					$command = Yii::app()->db->createCommand('INSERT INTO `tbl_property_user`(`user_id`, `pro_id`) VALUES ("'.$uid.'","'.$Last_id.'")')->execute();
					}
				
				}
				
				
			  $this->redirect(array('/PropertyDetails/admin'));	
				
			  
			}   
		}

		$this->render('create',array(
			'model'=>$model,
		));
		}
		else{
		echo "!Error 504 Page Not Found";
		}
	}      
        
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$cur_user = Yii::app()->user->id;
		$user = User::Model()->findAllByAttributes(array('id'=>$cur_user));
		if($user[0]['superuser']==1 or $user[0]['superuser']==2 or $user[0]['superuser']==3){
		$path='/uploads/img/';
		$rnd = rand(0,9999); 
		$model=$this->loadModel($id);
	/* 	echo "<pre>"; print_r($model['image']); die('ok'); */

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PropertyDetails']))
		{
				if($_POST['PropertyDetails']['image'] && !empty($_POST['PropertyDetails']['image'])) {
				$uploadedFile=CUploadedFile::getInstance($model,'image');				
				$fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
				$model->image = $fileName;
				$uploadedFile->saveAs(Yii::app()->basePath.'/../uploads/img/'.$fileName);
				}
				else { 
				$_POST['PropertyDetails']['image'] =	$model->image;
				}
				if(isset($_POST['assign_user'])){
					foreach($_POST['assign_user'] as $uid){
					$Last_id = $model->id; 
					$command = Yii::app()->db->createCommand('INSERT INTO `tbl_property_user`(`user_id`, `pro_id`) VALUES ("'.$uid.'","'.$Last_id.'")')->execute();
					}
				
				}
				
				
				
				$model->user_id=Yii::app()->user->id;
			/* 	$model->country=$_POST['country']; */
				$model->attributes=$_POST['PropertyDetails'];
				$model->unit=$_POST['PropertyDetails']['unit'][0];
				$model->unit_2=$_POST['PropertyDetails']['unit'][1];
				$model->unit_3=$_POST['PropertyDetails']['unit'][2];
				if($model->validate() && $model->save()) {
				
				$this->redirect(array('/PropertyDetails/admin'));
		}
		}

		$this->render('update',array(
			'model'=>$model,
		));
		}
		else{
		echo "!Error 504 Page Not Found";
		}
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
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
		$dataProvider=new CActiveDataProvider('PropertyDetails');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$cur_user = Yii::app()->user->id;
		$user = User::Model()->findAllByAttributes(array('id'=>$cur_user));
		if($user[0]['superuser']==1 or $user[0]['superuser']==2 or $user[0]['superuser']==3){		
		$model=new PropertyDetails('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PropertyDetails']))
			$model->attributes=$_GET['PropertyDetails'];

		$this->render('admin',array(
			'model'=>$model,
		));
		}
		else{
			echo "!Error 504 Page Not Found";
		}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return PropertyDetails the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=PropertyDetails::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param PropertyDetails $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='propery-details-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionFetchstates()
	{
		
		$command = Yii::app()->db->createCommand("SELECT * FROM states where countryID='".$_POST['con']."'");
		$data = $command->queryAll();
		echo '<option value="">-Select State-</option>';
		if(isset($data) && !empty($data)) {
			foreach($data as $k=>$v)
			{
				echo '<option value="'.$v['stateID'].'">'.$v['stateName'].'</option>';
			}
		}
			
	}
		
}

