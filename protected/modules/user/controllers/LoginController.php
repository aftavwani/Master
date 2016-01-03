<?php

class LoginController extends Controller
{
	public $defaultAction = 'login';
	

	/**
	 * Displays the login page
	 */
	public function actionLogin(){
	
		$siteurl='';
		
		if(isset($_SERVER['HTTP_REFERER'])){
			$siteurl = $_SERVER['HTTP_REFERER'];
		}
		if (Yii::app()->user->isGuest){
			$model=new UserLogin;
			$model->redirectUrl = $siteurl;
			// collect user input data
			if(isset($_POST['UserLogin'])){
				$model->attributes=$_POST['UserLogin'];
				// validate user input and redirect to previous page if valid
				if($model->validate()) {
					$this->lastViset();
					$siteurl1 = '';
					if(isset($_POST['UserLogin']['redirectUrl'])){
						$siteurl = explode('site',$_POST['UserLogin']['redirectUrl']);						
						if(isset($siteurl[1])){
							$siteurl1 = $siteurl[1];
						}
					}
					if (Yii::app()->user->returnUrl=='/'){
						if($siteurl1=='/chooseProduct'){
							$reviewPage = str_replace('chooseProduct', 'reviewSend', $_POST['UserLogin']['redirectUrl']);
							$this->redirect($reviewPage);
						}else{
							$this->redirect(Yii::app()->controller->module->returnUrl);
						}
					}else{
						if($siteurl1=='/chooseProduct'){
							$this->redirect(Yii::app()->createUrl('/site/productLogin'));
						}else{
							$this->redirect(Yii::app()->user->returnUrl);
						}						
					}
				}
			}
			// display the login form
			$this->render('/user/login',array('model'=>$model));
		} else
			$this->redirect(Yii::app()->controller->module->returnUrl);
	}
	
	public function  actionStudentlogin(){
	echo "Hello";
		$this->render('/user/studentlogin');
	}
	
	
	private function lastViset() {
		$lastVisit = User::model()->notsafe()->findByPk(Yii::app()->user->id);
		$lastVisit->lastvisit = time();
		$lastVisit->save();
	}
	
}