<?php

class SourceController extends Controller
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
				'actions'=>array('create','update'),
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
		$cur_user = Yii::app()->user->id;
		$user = User::Model()->findAllByAttributes(array('id'=>$cur_user));
		if($user[0]['superuser']==1 or $user[0]['superuser']==2  ){
		$model=new Source;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Source']))
		{
			$model->attributes=$_POST['Source'];
			$model->s_created = date('Y-m-d');
			$model->s_modified = date('Y-m-d');
			
			if($model->save())
				$this->redirect(array('view','id'=>$model->s_id));
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
		if($user[0]['superuser']==1){
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Source']))
		{
			$model->attributes=$_POST['Source'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->s_id));
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
		$cur_user = Yii::app()->user->id;
		$user = User::Model()->findAllByAttributes(array('id'=>$cur_user));
		if($user[0]['superuser']==1){
		$dataProvider=new CActiveDataProvider('Source');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
		}
	else{
	echo "!Error 504 Page Not Found";
	}
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$cur_user = Yii::app()->user->id;
		$user = User::Model()->findAllByAttributes(array('id'=>$cur_user));
		if($user[0]['superuser']==1){
		$model=new Source('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Source']))
			$model->attributes=$_GET['Source'];

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
	 * @return Source the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Source::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Source $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='source-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
