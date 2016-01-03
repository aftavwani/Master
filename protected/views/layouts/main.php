<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->


	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/colorbox.css" />
	<script>var base_url = <?php echo Yii::app()->request->baseUrl.'/'; ?></script>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
   
<body>     
<?php 
	$cur_date = date('m/d/Y');
	$rem  =  Yii::app()->db->createCommand('SELECT * FROM tbl_reminders WHERE date >="'.$cur_date.'"')->execute();
	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
	$base_url = Yii::app()->baseurl; 
	$url = explode($base_url."/" , $actual_link);
			if(isset($url[1]) && $url[1] =="user/login" ||  $url[1] =="user/recovery"){ } else {	?>           
	<div id="header">
		<div class="head-inn">
    <a  class="sty" href= "<?php echo Yii::app()->baseurl;?>"><div id="logo"><img src="<?php echo Yii::app()->baseurl; ?>/images/logo.jpg"></div></a>
       <div id="mainmenu">
	   <?php  $cur_users = Yii::app()->user->id;
		$abu =  Yii::app()->db->createCommand('SELECT * FROM tbl_users WHERE id='.$cur_users);
		$cur_user = $abu->queryAll(); 
		if($cur_user[0]['superuser']==1 || $cur_user[0]['superuser']==2){ ?>
		<span class="span-99"> <?php echo $rem; ?></span>
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				//array('label'=>'Home', 'url'=>array('/site/index'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Leads', 'url'=>array('/lead/admin'),'visible'=>!Yii::app()->user->isGuest),
				//array('label'=>'Priority', 'url'=>array('/priority/create'),'visible'=>!Yii::app()->user->isGuest),
				//array('label'=>'Source', 'url'=>array('/source/create'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Property', 'url'=>array('/propertyDetails/admin'),'visible'=>!Yii::app()->user->isGuest),
				//array('label'=>'Reminders', 'url'=>array('/reminders/admin'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Users', 'url'=>array('/user/admin/admin/'),'visible'=>!Yii::app()->user->isGuest),
				//array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Profile', 'url'=>array('/user/profile'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Reminders', 'url'=>array('/reminders/admin'),'visible'=>!Yii::app()->user->isGuest),
				//array('label'=>'Dashboard', 'url'=>array('/site/dashboard'), 'visible'=>!Yii::app()->user->isGuest),
				//array('label'=>'Login', 'url'=>array('/user/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),                                                       
		));
		} elseif($cur_user[0]['superuser']==3) { ?>  
		<span class="span-100"> <?php echo $rem; ?></span>		
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				//array('label'=>'Home', 'url'=>array('/site/index'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Leads', 'url'=>array('/lead/useradmin'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Property', 'url'=>array('/propertyDetails/admin'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Reminders', 'url'=>array('/reminders/admin'),'visible'=>!Yii::app()->user->isGuest),
				//array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Profile', 'url'=>array('/user/profile'),'visible'=>!Yii::app()->user->isGuest),
				//array('label'=>'Dashboard', 'url'=>array('/site/dashboard'), 'visible'=>!Yii::app()->user->isGuest),
				//array('label'=>'Login', 'url'=>array('/user/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),                                                 
		));
		}
		else{
		 $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				//array('label'=>'Home', 'url'=>array('/site/index'),'visible'=>!Yii::app()->user->isGuest),
	
				//array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Profile', 'url'=>array('/user/profile'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Dashboard', 'url'=>array('/site/dashboard'), 'visible'=>!Yii::app()->user->isGuest),
				//array('label'=>'Login', 'url'=>array('/user/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),                                               
  
		));
		}
		?> 
				                                      
    </div>
	<?php } ?>
    <!-- mainmenu -->
        
        </div>
	</div>
<div class="container" id="page">   

<!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div> 


<?php $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
	$url = explode($base_url."/" , $actual_link);
			if(isset($url[1]) && $url[1] =="user/login" ||  $url[1] =="user/recovery"){ } else {	?>   
</div><!-- page -->
	<div id="footer">
		TRUE Commercial Real Estate LLC<br/>
		All Rights Reserved.<br/>
		<?php //echo Yii::powered(); ?>
	</div><!-- footer -->
	<?php } ?>
<script type="text/javascript">

if(typeof jQuery == 'undefined' || typeof $ == 'undefined'){
        document.write('<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl.'/js/jquery.min.js';?>"></'+'script>');
  }
  
</script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/js/jquery.colorbox.js"></script>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl.'/js/custom.js'?>"></script>  
</body>
</html>


