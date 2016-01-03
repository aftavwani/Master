  <?php

/*
 * Copyright 2011 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
require_once 'src/Google_Client.php'; // include the required calss files for google login
require_once 'src/contrib/Google_PlusService.php';
require_once 'src/contrib/Google_Oauth2Service.php';

$client = new Google_Client();
$client->setApplicationName("Asig 18 Sign in with GPlus"); // Set your applicatio name
$client->setScopes(array('https://www.googleapis.com/auth/userinfo.email', 'https://www.googleapis.com/auth/plus.me')); // set scope during user login
$client->setClientId('33563737111-gtuhtrm5f7cd4t66023fao39k5u55ol7.apps.googleusercontent.com'); // paste the client id which you get from google API Console
$client->setClientSecret('O6IEQPCZw71vDSYVkZ-yKkRF'); // set the client secret
$client->setRedirectUri('http://instanttop.com/index.php/user/user/GmailSignup/oauth2callback/'); // paste the redirect URI where you given in APi Console. You will get the Access Token here during login success
$client->setDeveloperKey('AIzaSyBKvfFpG2RUNIFgKDM-fe_6dja9LpJoXRA'); // Developer key
$plus 		= new Google_PlusService($client);
$oauth2 	= new Google_Oauth2Service($client); // Call the OAuth2 class for get email address
if(isset($_GET['code'])) {
	$client->authenticate(); // Authenticate
	$_SESSION['access_token'] = $client->getAccessToken(); // get the access token here
	header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);
}

if(isset($_SESSION['access_token'])) {
	$client->setAccessToken($_SESSION['access_token']);
}

if ($client->getAccessToken()) {
  $user 		= $oauth2->userinfo->get();
  $me 			= $plus->people->get('me');
  $optParams 	= array('maxResults' => 100);
  $activities 	= $plus->activities->listActivities('me', 'public',$optParams);
  // The access token may have been updated lazily.
  $_SESSION['access_token'] 		= $client->getAccessToken();
  $email 							= filter_var($user['email'], FILTER_SANITIZE_EMAIL); // get the USER EMAIL ADDRESS using OAuth2
} else {
	$authUrl = $client->createAuthUrl();
}

if(isset($me)){ 
	$_SESSION['gplusuer'] = $me; // start the session
}

if(isset($_GET['logout'])) {
  unset($_SESSION['access_token']);
  unset($_SESSION['gplusuer']);
  session_destroy();
  header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']); // it will simply destroy the current seesion which you started before
  #header('Location: https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);
  
  /*NOTE: for logout and clear all the session direct goole jus un comment the above line an comment the first header function */
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gplus login using PHP with user email by asif18</title>
<style>
body{
	margin: 0;
	padding: 0;
	font-family: arial;
	color: #2C2C2C;
	font-size: 14px;
}
h1 a{
	color:#2C2C2C;
	text-decoration:none;
}
h1 a:hover{
	text-decoration:underline;
}
a{
	color: #069FDF;
}
.wrapper{
	margin: 0 auto;

}
.mytable{
	width: 700px;
	margin: 0 auto;
	border:2px dashed #17A3F7;
	padding: 20px;
}
</style>
</head>
<body>
<div class="wrapper">
	<div class="container">
		<div class="row">
			<div class="user-login">
				<div class="left col-lg-6 col-md-6 col-sm-6 col-xs-12" style="border-right:1px solid #CCCCCC">
			<?php
$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Login");
$this->breadcrumbs=array(
	UserModule::t("Login"),
);?>
	<?php if(Yii::app()->user->hasFlash('success')): ?>
	<div class="flash-success" style="padding-bottom:25px;">
    	<font color="green"><?php echo Yii::app()->user->getFlash('success'); ?> </font>
	</div>
<?php endif; ?>


<h1><?php echo UserModule::t("Login"); ?></h1>

<?php if(Yii::app()->user->hasFlash('loginMessage')): ?>

<div class="success">
	<?php echo Yii::app()->user->getFlash('loginMessage'); ?>
</div>

<?php endif; ?>

<p><?php echo UserModule::t("Please fill out the following form with your login credentials:"); ?></p>

<div class="form">
<?php echo CHtml::beginForm(); ?>

	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
	
	<?php echo CHtml::errorSummary($model); ?>
	
	<div class="row">
		<?php //echo CHtml::activeLabelEx($model,'username'); ?>
		<?php echo CHtml::activeTextField($model,'username',array('placeholder'=>'ENTER USERNAME/EMAIL')) ?>
		<?php echo CHtml::activeHiddenField($model,'redirectUrl',array('value'=>Yii::app()->createUrl('/user/user/signup'))) ?>
	</div>
	
	<div class="row">
		<?php //echo CHtml::activeLabelEx($model,'Password'); ?>
		<?php echo CHtml::activePasswordField($model,'password',array('placeholder'=>'ENTER PASSWORD')) ?>
	</div>
	
	
	
	<div class="row rememberMe">
		<?php echo CHtml::activeCheckBox($model,'rememberMe'); ?>
		<?php echo CHtml::activeLabelEx($model,'rememberMe'); ?>
	</div>

	<div class="row submit">
		<?php echo CHtml::submitButton(UserModule::t("Login")); ?>
	</div>
	<div class="row">
		<p class="hint">
		<?php echo CHtml::link(UserModule::t("Register"),Yii::app()->getModule('user')->registrationUrl); ?> | <?php echo CHtml::link(UserModule::t("Lost Password?"),Yii::app()->getModule('user')->recoveryUrl); ?>
		</p>
	</div>
	
<?php echo CHtml::endForm(); ?>
</div><!-- form -->


				</div>
				<div class="right col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="social-log">
						<div class="social-login">
						<a href="#" onClick="FBLogin();"><img width="254" src="<?php echo Yii::app()->request->baseUrl.'/img/Facebook.jpg';?>"></a>
						</div>
						<div class="social-login">
						<?php 
						if(isset($authUrl)) {
						echo "<a class='login' href='$authUrl'><img src=/img/Google.jpg alt=\"Google login \" title=\"login with google\" /></a>";
						} else {
						echo "<a class='logout' href='index.php?logout'>Logout</a>";
						}
						if(isset($_SESSION['gplusuer'])){ ?>
						</div>
					</div>
				<div>
				<br/><br/>
<table class="mytable">
<tr>
	<td>Name:</td>
	<td><?php print $me['displayName']; ?></td>
	<td rowspan="5" valign="top"><img src="https://plus.google.com/s2/photos/profile/<?php print $me['id']; ?>?sz=100" /></td><!-- user profile photo,it vary sizes you can set custom size here -->
</tr>
<tr>
	<td>Email</td>
	<td><span style="background:#FFFF00;"><?php print $user['email']; ?></span></td>
</tr>
<tr>
	<td>Gplus Id</td>
	<td><?php print $me['id']; ?></td>
</tr>
<tr>
	<td>Gender</td>
	<td><?php print $me['gender']; ?></td>
</tr>
<tr>
	<td>Relationship</td>
	<td><?php print $me['relationshipStatus']; ?></td>
</tr>
<tr>
	<td>Location</td>
	<td><?php print $me['placesLived'][0]['value']; ?></td>
</tr>
<tr>
	<td>Tagline</td>
	<td><?php print $me['tagline']; ?></td>
</tr>
</table>
<?php } ?>
</div>
</body>
</html>

<script type="text/javascript">
window.fbAsyncInit = function() {
	FB.init({
	appId      : '627440634029646', // replace your app id here
	channelUrl : 'http://112.196.1.179/mobile', 
	status     : true, 
	cookie     : true, 
	xfbml      : true  
	});
};
(function(d){
	var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
	if (d.getElementById(id)) {return;}
	js = d.createElement('script'); js.id = id; js.async = true;
	js.src = "//connect.facebook.net/en_US/all.js";
	ref.parentNode.insertBefore(js, ref);
}(document));

function FBLogin(){
	FB.login(function(response){
		if(response.authResponse){ 
			window.location.href = "<?php echo Yii::app()->createUrl('/user/user/signup');?>";
		}
	}, {scope: 'email,user_likes'});
}

</script>
<?php //echo Yii::app()->createUrl('/user/fSign');?>


<?php
$form = new CForm(array(
    'elements'=>array(
        'username'=>array(
            'type'=>'text',
            'maxlength'=>32,
        ),
        'password'=>array(
            'type'=>'password',
            'maxlength'=>32,
        ),
        'rememberMe'=>array(
            'type'=>'checkbox',
        )
    ),

    'buttons'=>array(
        'login'=>array(
            'type'=>'submit',
            'label'=>'Login',
        ),
    ),
), $model);
?>
</div>
</div>
</div>