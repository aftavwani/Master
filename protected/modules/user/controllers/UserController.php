<?php

class UserController extends Controller
{
	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return CMap::mergeArray(parent::filters(),array(
			'accessControl', // perform access control for CRUD operations
		));
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
				'actions'=>array('index','view','Signup','GmailSignup'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}	

	/**
	 * Displays a particular model.
	 */
	public function actionView()
	{
		$model = $this->loadModel();
		$this->render('view',array(
			'model'=>$model,
		));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('User', array(
			'criteria'=>array(
		        'condition'=>'status>'.User::STATUS_BANNED,
		    ),
				
			'pagination'=>array(
				'pageSize'=>Yii::app()->controller->module->user_page_size,
			),
		));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=User::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the primary key value. Defaults to null, meaning using the 'id' GET variable
	 */
	public function loadUser($id=null)
	{
		if($this->_model===null)
		{
			if($id!==null || isset($_GET['id']))
				$this->_model=User::model()->findbyPk($id!==null ? $id : $_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
	
	public function actionSignup(){ 		
	require_once(Yii::app()->basePath.'/modules/user/views/user/src/facebook.php');
		$appid 		= "627440634029646";
		$appsecret  = "0477ff65ba5a3f20fe811ba0a10521db"; 
		$facebook   = new Facebook(array(
			'appId' => $appid,
			'secret' => $appsecret,
			'cookie' => TRUE,
		));
		$fbuser = $facebook->getUser();
		
		if ($fbuser) {
			try {
				$user_profile =$facebook->api('/'.$fbuser);
			}
			catch (Exception $e) {
				echo $e->getMessage();
				exit();
			}
		
			$email = $user_profile["email"];
			$username = $user_profile["first_name"];
			$lastname = $user_profile["last_name"];
			$userData=User::model()->find('username="'.$username.'" or email="'.$email.'"');
			
			if($userData){ 
	
					$model = new UserLoginFB;
					if(User::model()->find('username="'.$username.'"'))
					$model->username = $userData->username;
					else
					$model->email = $userData->email;
					$model->password = $userData->password;
					if($model->validate()){
					Yii::app()->user->returnUrl=Yii::app()->request->urlReferrer;
						$this->redirect(Yii::app()->user->returnUrl);
					}
					
			}
			else{
			
			$model = new User();
			$model->email=$email;
			$model->username=$username;
			$password = rand(0,999999999);
			$pass = md5($password);
			$model->password=$pass;
			$model->status=1;
			$model->create_at=date('Y-m-d H:i:s');
			/* 	if(!$model->save())
				{
				var_dump($model->getErrors());die("error");
				} */
			if($model->save()){
		//echo "he"; die('ok');
				$modelprofile = new Profile();
				$modelprofile->user_id = $model->id;
				$modelprofile->	lastname = $lastname; 
				$modelprofile->	firstname = $username;
				$modelprofile->save();
				
				$model1=new UserLogin;
				$model1->username=$username;
				$model1->password=$password;
				if($model1->validate()){
					$Url=Yii::app()->request->urlReferrer;
						$this->redirect(Yii::app()->user->returnUrl);
				  }
			
					//$this->redirect(Yii::app()->user->returnUrl);
		    	}
			}
			}
		}	
		public function actionGmailSignup(){ 	
			require_once(Yii::app()->basePath.'/modules/user/views/src/Google_Client.php');
			//require_once 'src/Google_Client.php'; // include the required calss files for google login
			require_once(Yii::app()->basePath.'/modules/user/views/src/contrib/Google_PlusService.php');
			require_once(Yii::app()->basePath.'/modules/user/views/src/contrib/Google_Oauth2Service.php');
			$client = new Google_Client();
			$client->setApplicationName("Asig 18 Sign in with GPlus"); // Set your applicatio name
			$client->setScopes('https://www.googleapis.com/auth/analytics');
			//$client->setScopes// set scope during user login
			$client->setClientId('33563737111-gtuhtrm5f7cd4t66023fao39k5u55ol7.apps.googleusercontent.com'); // paste the client id which you get from google API Console
			$client->setClientSecret('O6IEQPCZw71vDSYVkZ-yKkRF'); // set the client secret
			$client->setRedirectUri('http://instanttop.com/index.php/user/user/GmailSignup/oauth2callback/'); // paste the redirect URI where you given in APi Console. You will get the Access Token here during login success
			$client->setDeveloperKey('AIzaSyBKvfFpG2RUNIFgKDM-fe_6dja9LpJoXRA'); // Developer key
			$plus 		= new Google_PlusService($client);
			$oauth2 	= new Google_Oauth2Service($client); // Call the OAuth2 class for get email address
			$google_client_id 		= '402738627423-lsvdi7fvl9bf7j8ai96lc6sri1evsq9b.apps.googleusercontent.com';
			$google_client_secret 	= 'TfvlOFg9eevgL_muiOaxiTeL';
			$google_redirect_url 	= 'https://instanttop.com/index.php/user/user/GmailSignup/oauth2callback/'; //path to your script
			$google_developer_key 	= 'AIzaSyCXtRDlIE1GzcZ5UC9AdE17ib53Gnnx8Qk';


			$gClient = new Google_Client();
			$gClient->setApplicationName('Login to Sanwebe.com');
			$gClient->setClientId($google_client_id);
			$gClient->setClientSecret($google_client_secret);
			$gClient->setRedirectUri($google_redirect_url);
			$gClient->setDeveloperKey($google_developer_key);

			$google_oauthV2 = new Google_Oauth2Service($gClient);

			//If user wish to log out, we just unset Session variable
			if (isset($_REQUEST['reset'])) 
			{
			  unset($_SESSION['token']);
			  $gClient->revokeToken();
			  header('Location: ' . filter_var($google_redirect_url, FILTER_SANITIZE_URL)); //redirect user back to page
			}

			if (isset($_GET['code'])) 
				{ 
					$gClient->authenticate($_GET['code']);
					$_SESSION['token'] = $gClient->getAccessToken();
					header('Location: ' . filter_var($google_redirect_url, FILTER_SANITIZE_URL));
					return;
				}


				if (isset($_SESSION['token'])) 
				{ 
					$gClient->setAccessToken($_SESSION['token']);
				}


				if ($gClient->getAccessToken()) 
				{
					  //For logged in user, get details from google using access token
					  $user 				= $google_oauthV2->userinfo->get();
					  $user_id 				= $user['id'];
					  $user_name 			= filter_var($user['name'], FILTER_SANITIZE_SPECIAL_CHARS);
					  $email 				= filter_var($user['email'], FILTER_SANITIZE_EMAIL);
					  $profile_url 			= filter_var($user['link'], FILTER_VALIDATE_URL);
					  $profile_image_url 	= filter_var($user['picture'], FILTER_VALIDATE_URL);
					  $personMarkup 		= "$email<div><img src='$profile_image_url?sz=50'></div>";
					  $_SESSION['token'] 	= $gClient->getAccessToken();
					
					$username = $user_name;
					$lastname = $user['family_name'];
					$userData=User::model()->find('username="'.$username.'" or email="'.$email.'"');
					
							echo "heredf";
					if($userData){ 
							echo "here";
							$model = new UserLoginFB;
							if(User::model()->find('username="'.$username.'"'))
							$model->username = $userData->username;
							else
							$model->email = $userData->email;
							$model->password = $userData->password;
							if($model->validate()){
							Yii::app()->user->returnUrl=Yii::app()->request->urlReferrer;
								$this->redirect(Yii::app()->user->returnUrl);
							}
							
					}
					else{
					echo "string";
					$model = new User();
					$model->email=$email;
					$model->username=$username;
					$password = rand(0,999999999);
					$pass = md5($password);
					$model->password=$pass;
					$model->status=1;
					$model->create_at=date('Y-m-d H:i:s');
					/* 	if(!$model->save())
						{
						var_dump($model->getErrors());die("error");
						} */
						
					if($model->save()){
						
						$modelprofile = new Profile();
						$modelprofile->user_id = $model->id;
						$modelprofile->	lastname = $lastname; 
						$modelprofile->	firstname = $username;
						$modelprofile->save();
						
						$model1=new UserLogin;
						$model1->username=$username;
						$model1->password=$password;
						if($model1->validate()){
							$Url=Yii::app()->request->urlReferrer;
								$this->redirect(Yii::app()->user->returnUrl);
						  }
					
							//$this->redirect(Yii::app()->user->returnUrl);
				    	}
					$this->render('login', array('model'=>$model));
					}
				}else{
					//For Guest user, get google login url
					$authUrl = $gClient->createAuthUrl();
				}

		}		
	}  
				
				
				
					
				
	
