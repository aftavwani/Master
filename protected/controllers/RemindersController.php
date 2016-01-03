<?php

class RemindersController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','admin'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
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
		$model=new Reminders;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Reminders']))
		{
			$model->attributes=$_POST['Reminders'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
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

		if(isset($_POST['Reminders']))
		{
			$model->attributes=$_POST['Reminders'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		$dataProvider=new CActiveDataProvider('Reminders');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$users = Yii::app()->db->createCommand("SELECT * FROM `tbl_users` WHERE id=".Yii::app()->user->id);
		$use = $users->queryAll(); 
		
		if($use[0]['superuser'] == 4) { 
			echo '<script type="text/javascript">'; 
			echo 'window.location.href = "http://182.75.35.84/217_php/site/dashboard";';
			echo '</script>';
		}
		else{ 
		$model=new Reminders('search');
		$model->unsetAttributes(); 
		$cur_date = date('m/d/Y');
		//$todays = Reminders::Model()->findallByattributes(array('date'=>$cur_date ));
		
		/* $comma = Yii::app()->db->createCommand('SELECT tbl_lead_fields.retail,tbl_lead_fields.id,tbl_lead_fields.id, tbl_reminders.msg ,tbl_reminders.date ,tbl_reminders.time ,tbl_lead_fields.email_id,	tbl_lead_fields.first_name,tbl_lead_fields.phone_1 FROM
		tbl_lead_fields JOIN 
		tbl_reminders ON tbl_lead_fields.id = tbl_reminders.lead_id and tbl_reminders.date ="'.$cur_date.'" ');	 */		
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
		WHERE   b.date = "'.$cur_date.'" ORDER BY date Desc LIMIT 10');
		$todays = $comma->queryAll();
		
	/*  echo "<pre>"; print_r($todays); die('ok');   */
		// clear any default values
		if(isset($_GET['Reminders']))
			$model->attributes=$_GET['Reminders'];

		$this->render('admin',array('model'=>$model,'today'=>$todays));
	}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Reminders the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Reminders::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Reminders $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='reminders-form')
		{
			echo CActiveForm::validate($model);         
			Yii::app()->end();
		}
	}
}
