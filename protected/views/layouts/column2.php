<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span-19">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<div class="span-5 last flt">
	<div id="sidebar sid-bg">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Operations',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
		
	?>
		<?php  $cur_users = Yii::app()->user->id;
		$abu =  Yii::app()->db->createCommand('SELECT * FROM tbl_users WHERE id='.$cur_users);
		$cur_user = $abu->queryAll(); 
		if($cur_user[0]['superuser']==1){ ?>
		<a class="main-right" href="<?php echo Yii::app()->baseUrl;?>/lead/import">Import Leads</a>
		<a class="main-right" href="<?php echo Yii::app()->baseUrl;?>/lead/export">Export Leads</a>
			<?php } ?>
	</div><!-- sidebar -->
</div>
<?php $this->endContent(); ?>

