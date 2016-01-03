<?php
/* $this->breadcrumbs=array(
	UserModule::t("Users"),
); */
if(UserModule::isAdmin()) {
	$this->layout='//layouts/column2';
	$this->menu=array(
	    array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin')),
	    array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('profileField/admin')),
	);
}
?>

<h1><?php echo UserModule::t("List User"); ?></h1>
<div class="admi-di">
<div class="admi-inner">
<div class="admi-hd">Abbreviation for user status</div>
<div class="in-ad in-bdr in-tr">
<div class="in-num">1</div>
<div class="in-cont">Admin</div>
</div>
<div class="in-ad in-bdr">
<div class="in-num">2</div>
<div class="in-cont">Staff</div>
</div>
<div class="in-ad in-tr">
<div class="in-num">3</div>
<div class="in-cont">Agent</div>
</div>
<div class="in-ad">
<div class="in-num">4</div>
<div class="in-cont">Simple User</div>
</div>
</div>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		array(
			'name' => 'username',
			'type'=>'raw',
			'value' => 'CHtml::link(CHtml::encode($data->username),array("user/view","id"=>$data->id))',
		),		
		'email',
		'superuser',
		'create_at',
		'lastvisit_at',
	),
)); ?>
