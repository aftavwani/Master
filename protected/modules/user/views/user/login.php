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
		<div align="center">
			 <div class="rows">
		     
		
			<?php
/* $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Login");
$this->breadcrumbs=array(
	UserModule::t("Login"),
); */ ?>
	<?php if(Yii::app()->user->hasFlash('success')): ?>
	<div class="flash-success" style="padding-bottom:25px;">
    	<font color="green"><?php echo Yii::app()->user->getFlash('success'); ?> </font>
	</div>
<?php endif; ?>


<div class="login-out">
<div class="logo-login"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.jpg"></div>
<h1><?php echo UserModule::t("Login to Your Account"); ?></h1>

<?php if(Yii::app()->user->hasFlash('loginMessage')): ?>

<div class="success">
	<?php echo Yii::app()->user->getFlash('loginMessage'); ?>
</div>
</div>
<?php endif; ?>

<p><?php //echo UserModule::t("Please fill out the following form with your login credentials:"); ?></p>

<div class="form">
<?php echo CHtml::beginForm(); ?>

	<p class="note"><?php //echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
	
	<?php echo CHtml::errorSummary($model); ?>
	<div class="user-n">User Name / Email:</div>
	<div class="rows">
    
		<?php //echo CHtml::activeLabelEx($model,'username'); ?>
		<?php echo CHtml::activeTextField($model,'username',array('placeholder'=>'User Name / Email','class'=>'inp-t')) ?>
		<?php echo CHtml::activeHiddenField($model,'redirectUrl') ?>
		
	</div>
	<div class="pass-n">Password</div>
	<div class="rows">
    
		<?php //echo CHtml::activeLabelEx($model,'Password'); ?>
		<?php echo CHtml::activePasswordField($model,'password',array('placeholder'=>'Enter Password','class'=>'inp-t')) ?>
	</div>
	
		<div class="rows submit">
		<?php echo CHtml::submitButton(UserModule::t("Login"),array("class"=>"log-but")); ?>
		
	</div>
	
	<div class="rows rememberMe">
		<?php echo CHtml::activeCheckBox($model,'rememberMe'); ?>
		<?php echo CHtml::activeLabelEx($model,'rememberMe'); ?>
	</div>
<div class="lost">Forgot your password?<br>
<span>No worries,<?php echo CHtml::link(UserModule::t("Click Here"),Yii::app()->getModule('user')->recoveryUrl); ?> to reset your password

</span>        
</div>
                                      
                 
	<div class="rows">
		<p class="hint">
		
		</p>
	</div>
	
<?php echo CHtml::endForm(); ?>
</div><!-- form -->


				</div>
			


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
</div>
</div>
</div>
</div>